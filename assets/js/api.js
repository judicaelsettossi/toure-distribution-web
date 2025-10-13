// Configuration API globale
const API_CONFIG = {
    baseUrl: 'https://toure.gestiem.com/api',
    timeout: 30000
};

// Fonction utilitaire pour récupérer les cookies
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return '';
}

// Fonction utilitaire pour faire des appels API
async function apiCall(endpoint, method = 'GET', data = null, options = {}) {
    const url = API_CONFIG.baseUrl + endpoint;
    
    const defaultOptions = {
        method: method,
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${getCookie('access_token')}`
        },
        timeout: API_CONFIG.timeout
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

    try {
        const response = await fetch(url, finalOptions);
        const result = await response.json();

        return {
            success: response.ok,
            status: response.status,
            data: result,
            response: response
        };
    } catch (error) {
        console.error('API Call Error:', error);
        return {
            success: false,
            error: error.message,
            status: 0
        };
    }
}

// Fonctions spécifiques pour les produits
const ProductAPI = {
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

// Fonctions spécifiques pour les catégories
const CategoryAPI = {
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

// Fonction utilitaire pour afficher les notifications
function showNotification(type, message, duration = 3000) {
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

// Fonction utilitaire pour formater les prix
function formatPrice(price) {
    return new Intl.NumberFormat('fr-FR').format(price || 0) + ' FCFA';
}

// Fonction utilitaire pour formater les dates
function formatDate(dateString, options = {}) {
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

// Fonction utilitaire pour valider les emails
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Fonction utilitaire pour valider les UUIDs
function isValidUUID(uuid) {
    const uuidRegex = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i;
    return uuidRegex.test(uuid);
}

// Fonction pour gérer les erreurs API de manière centralisée
function handleApiError(error, defaultMessage = 'Une erreur est survenue') {
    console.error('API Error:', error);
    
    let message = defaultMessage;
    
    if (error.data && error.data.message) {
        message = error.data.message;
    } else if (error.error) {
        message = error.error;
    } else if (error.status === 401) {
        message = 'Session expirée. Veuillez vous reconnecter.';
        // Rediriger vers la page de connexion
        setTimeout(() => {
            window.location.href = '/login';
        }, 2000);
    } else if (error.status === 404) {
        message = 'Ressource non trouvée.';
    } else if (error.status === 500) {
        message = 'Erreur serveur. Veuillez réessayer plus tard.';
    }
    
    showNotification('error', message);
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
