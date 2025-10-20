// Configuration API globale - utiliser une variable globale pour éviter les conflits
if (typeof window.API_CONFIG === 'undefined') {
    window.API_CONFIG = {
        baseUrl: 'https://toure.gestiem.com/api',
        timeout: 30000,
        maxRetries: 3,
        retryDelay: 1000,
        exponentialBackoff: true
    };
}
// Utiliser var au lieu de const/let pour éviter les erreurs de redéclaration
var API_CONFIG = window.API_CONFIG;

// État de connexion réseau
if (typeof window.NetworkState === 'undefined') {
    window.NetworkState = {
        isOnline: navigator.onLine,
        listeners: [],
        
        addListener: function(callback) {
            this.listeners.push(callback);
        },
        
        removeListener: function(callback) {
            this.listeners = this.listeners.filter(cb => cb !== callback);
        },
        
        notifyListeners: function() {
            this.listeners.forEach(callback => callback(this.isOnline));
        }
    };
    
    // Écouter les changements de connexion réseau
    window.addEventListener('online', function() {
        window.NetworkState.isOnline = true;
        window.NetworkState.notifyListeners();
        console.log('[Network] Connection restored');
    });
    
    window.addEventListener('offline', function() {
        window.NetworkState.isOnline = false;
        window.NetworkState.notifyListeners();
        console.log('[Network] Connection lost');
    });
}

// Fonction utilitaire pour récupérer les cookies
if (typeof getCookie === 'undefined') {
    window.getCookie = function(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return '';
    }
}

// Fonction utilitaire pour faire des appels API avec retry et gestion d'erreurs améliorée
if (typeof apiCall === 'undefined') {
    window.apiCall = async function(endpoint, method = 'GET', data = null, options = {}) {
        const maxRetries = options.maxRetries !== undefined ? options.maxRetries : API_CONFIG.maxRetries;
        const retryDelay = options.retryDelay !== undefined ? options.retryDelay : API_CONFIG.retryDelay;
        const exponentialBackoff = options.exponentialBackoff !== undefined ? options.exponentialBackoff : API_CONFIG.exponentialBackoff;
        
        let lastError = null;
        
        for (let attempt = 0; attempt <= maxRetries; attempt++) {
            try {
                // Vérifier la connexion réseau avant de faire l'appel
                if (!window.NetworkState.isOnline) {
                    throw new Error('Network disconnected');
                }
                
                const result = await apiCallSingle(endpoint, method, data, options);
                
                // Si succès, retourner le résultat
                if (result.success || !isRetriableError(result)) {
                    return result;
                }
                
                lastError = result;
                
            } catch (error) {
                lastError = {
                    success: false,
                    error: error.message,
                    status: 0,
                    isNetworkError: true
                };
                
                // Ne pas réessayer si ce n'est pas une erreur réseau retriable
                if (!isRetriableError(lastError)) {
                    return lastError;
                }
            }
            
            // Si ce n'est pas la dernière tentative, attendre avant de réessayer
            if (attempt < maxRetries) {
                const delay = exponentialBackoff ? retryDelay * Math.pow(2, attempt) : retryDelay;
                console.log(`[API] Retry attempt ${attempt + 1}/${maxRetries} after ${delay}ms for ${endpoint}`);
                await sleep(delay);
            }
        }
        
        // Toutes les tentatives ont échoué
        console.error(`[API] All retry attempts failed for ${endpoint}`, lastError);
        return lastError;
    };
    
    // Fonction pour faire un seul appel API (sans retry)
    window.apiCallSingle = async function(endpoint, method = 'GET', data = null, options = {}) {
        const url = API_CONFIG.baseUrl + endpoint;
        const timeout = options.timeout !== undefined ? options.timeout : API_CONFIG.timeout;
        
        const defaultOptions = {
            method: method,
            headers: {
                'Accept': 'application/json',
                'Authorization': `Bearer ${getCookie('access_token')}`
            }
        };

        // Ajouter Content-Type pour les données JSON
        if (data && method !== 'GET') {
            if (data instanceof FormData) {
                // Pour FormData, ne pas définir Content-Type, laissez le navigateur le faire
                defaultOptions.body = data;
            } else {
                defaultOptions.headers['Content-Type'] = 'application/json';
                defaultOptions.body = JSON.stringify(data);
            }
        }

        // Fusionner les options personnalisées
        const finalOptions = { ...defaultOptions, ...options };
        delete finalOptions.timeout; // Remove timeout from fetch options
        delete finalOptions.maxRetries;
        delete finalOptions.retryDelay;
        delete finalOptions.exponentialBackoff;

        try {
            // Créer un AbortController pour gérer le timeout
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), timeout);
            finalOptions.signal = controller.signal;
            
            const response = await fetch(url, finalOptions);
            clearTimeout(timeoutId);
            
            const result = await response.json();

            return {
                success: response.ok,
                status: response.status,
                data: result,
                response: response
            };
        } catch (error) {
            console.error('API Call Error:', error);
            
            // Déterminer le type d'erreur
            let errorType = 'unknown';
            let isNetworkError = false;
            
            if (error.name === 'AbortError') {
                errorType = 'timeout';
                isNetworkError = true;
            } else if (error.message.includes('Failed to fetch') || 
                       error.message.includes('Network request failed') ||
                       error.message.includes('Network disconnected')) {
                errorType = 'network';
                isNetworkError = true;
            } else if (error.message.includes('JSON')) {
                errorType = 'parse';
            }
            
            return {
                success: false,
                error: error.message,
                errorType: errorType,
                isNetworkError: isNetworkError,
                status: 0
            };
        }
    };
    
    // Vérifier si une erreur est retriable
    window.isRetriableError = function(error) {
        // Erreurs réseau sont retriables
        if (error.isNetworkError) return true;
        
        // Status codes retriables
        const retriableStatuses = [408, 429, 500, 502, 503, 504];
        if (error.status && retriableStatuses.includes(error.status)) return true;
        
        // Timeout errors
        if (error.errorType === 'timeout' || error.errorType === 'network') return true;
        
        return false;
    };
    
    // Fonction utilitaire pour attendre
    window.sleep = function(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    };
}

// Fonctions spécifiques pour les produits
if (typeof ProductAPI === 'undefined') {
    window.ProductAPI = {
    // Récupérer tous les produits
    getAll: async (page = 1, limit = 10, search = '', category = '', status = '') => {
        let endpoint = `/products?page=${page}&limit=${limit}`;
        
        if (search) endpoint += `&search=${encodeURIComponent(search)}`;
        if (category) endpoint += `&category=${encodeURIComponent(category)}`;
        if (status) endpoint += `&status=${encodeURIComponent(status)}`;
        
        return await apiCall(endpoint);
    },

    // Récupérer un produit par ID
    getById: async (productId) => {
        return await apiCall(`/products/${productId}`);
    },

    // Créer un nouveau produit
    create: async (productData) => {
        return await apiCall('/products', 'POST', productData);
    },

    // Modifier un produit
    update: async (productId, productData) => {
        return await apiCall(`/products/${productId}`, 'PUT', productData);
    },

    // Supprimer un produit
    delete: async (productId) => {
        return await apiCall(`/products/${productId}`, 'DELETE');
    }
    };
}

// Fonctions spécifiques pour les catégories
if (typeof CategoryAPI === 'undefined') {
    window.CategoryAPI = {
    // Récupérer toutes les catégories
    getAll: async () => {
        return await apiCall('/product-categories');
    },

    // Récupérer une catégorie par ID
    getById: async (categoryId) => {
        return await apiCall(`/product-categories/${categoryId}`);
    },

    // Créer une nouvelle catégorie
    create: async (categoryData) => {
        return await apiCall('/product-categories', 'POST', categoryData);
    },

    // Modifier une catégorie
    update: async (categoryId, categoryData) => {
        return await apiCall(`/product-categories/${categoryId}`, 'PUT', categoryData);
    },

    // Supprimer une catégorie
    delete: async (categoryId) => {
        return await apiCall(`/product-categories/${categoryId}`, 'DELETE');
    }
    };
}

// Fonction utilitaire pour afficher les notifications
if (typeof showNotification === 'undefined') {
    window.showNotification = function(type, message, duration = 3000) {
    const toast = document.createElement('div');
    toast.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : type === 'warning' ? 'warning' : 'info'} position-fixed top-0 end-0 m-3`;
    toast.style.zIndex = '9999';
    toast.style.minWidth = '300px';

    const icons = {
        success: 'check-circle',
        error: 'exclamation-triangle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };

    const icon = icons[type] || 'info-circle';
    toast.innerHTML = `<i class="bi-${icon} me-2"></i>${message}`;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, duration);
    }
}

// Fonction utilitaire pour formater les prix
if (typeof formatPrice === 'undefined') {
    window.formatPrice = function(price) {
        return new Intl.NumberFormat('fr-FR').format(price || 0) + ' FCFA';
    }
}

// Fonction utilitaire pour formater les dates
if (typeof formatDate === 'undefined') {
    window.formatDate = function(dateString, options = {}) {
    if (!dateString) return '-';
    
    const date = new Date(dateString);
    const defaultOptions = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    
    return date.toLocaleDateString('fr-FR', { ...defaultOptions, ...options });
    }
}

// Fonction utilitaire pour valider les emails
if (typeof isValidEmail === 'undefined') {
    window.isValidEmail = function(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
}

// Fonction utilitaire pour valider les UUIDs
if (typeof isValidUUID === 'undefined') {
    window.isValidUUID = function(uuid) {
        const uuidRegex = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i;
        return uuidRegex.test(uuid);
    }
}

// Fonction pour gérer les erreurs API de manière centralisée
if (typeof handleApiError === 'undefined') {
    window.handleApiError = function(error, defaultMessage = 'Une erreur est survenue') {
    console.error('API Error:', error);
    
    let message = defaultMessage;
    let shouldRedirect = false;
    
    // Gérer les erreurs réseau spécifiques
    if (error.isNetworkError || error.errorType === 'network') {
        if (!window.NetworkState.isOnline) {
            message = 'Vous êtes hors ligne. Veuillez vérifier votre connexion internet.';
        } else {
            message = 'Erreur de connexion au serveur. Veuillez réessayer.';
        }
    } else if (error.errorType === 'timeout') {
        message = 'Le serveur met trop de temps à répondre. Veuillez réessayer.';
    } else if (error.data && error.data.message) {
        message = error.data.message;
    } else if (error.error) {
        // Nettoyer les messages d'erreur techniques
        if (error.error.includes('Failed to fetch')) {
            message = 'Impossible de contacter le serveur. Veuillez vérifier votre connexion.';
        } else if (error.error.includes('Network request failed')) {
            message = 'Erreur de connexion réseau. Veuillez réessayer.';
        } else if (error.error.includes('Network disconnected')) {
            message = 'Connexion réseau perdue. Veuillez vérifier votre connexion internet.';
        } else {
            message = error.error;
        }
    } else if (error.status === 401) {
        message = 'Session expirée. Veuillez vous reconnecter.';
        shouldRedirect = true;
    } else if (error.status === 403) {
        message = 'Vous n\'avez pas les permissions nécessaires pour cette opération.';
    } else if (error.status === 404) {
        message = 'Ressource non trouvée.';
    } else if (error.status === 408) {
        message = 'Délai d\'attente dépassé. Veuillez réessayer.';
    } else if (error.status === 429) {
        message = 'Trop de requêtes. Veuillez patienter un moment avant de réessayer.';
    } else if (error.status === 500) {
        message = 'Erreur serveur. Veuillez réessayer plus tard.';
    } else if (error.status === 502 || error.status === 503 || error.status === 504) {
        message = 'Le serveur est temporairement indisponible. Veuillez réessayer plus tard.';
    }
    
    showNotification('error', message);
    
    // Rediriger vers la page de connexion si nécessaire
    if (shouldRedirect) {
        setTimeout(() => {
            window.location.href = '/login';
        }, 2000);
    }
    }
}

// Export pour utilisation dans d'autres fichiers
window.API_CONFIG = API_CONFIG;
window.apiCall = apiCall;
window.ProductAPI = ProductAPI;
window.CategoryAPI = CategoryAPI;
window.showNotification = showNotification;
window.formatPrice = formatPrice;
window.formatDate = formatDate;
window.isValidEmail = isValidEmail;
window.isValidUUID = isValidUUID;
window.handleApiError = handleApiError;
window.getCookie = getCookie;
