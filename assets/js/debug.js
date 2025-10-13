// Script de debug pour les erreurs JavaScript
console.log('=== DEBUG MODE ACTIVÉ ===');

// Intercepter les erreurs JavaScript
window.addEventListener('error', function(e) {
    console.error('❌ Erreur JavaScript:', e.error);
    console.error('Fichier:', e.filename);
    console.error('Ligne:', e.lineno);
    console.error('Message:', e.message);
    
    // Afficher l'erreur dans une notification
    if (typeof showNotification === 'function') {
        showNotification('error', `Erreur JS: ${e.message}`);
    }
});

// Intercepter les erreurs de promesses non gérées
window.addEventListener('unhandledrejection', function(e) {
    console.error('❌ Promise rejetée:', e.reason);
    if (typeof showNotification === 'function') {
        showNotification('error', `Promise rejetée: ${e.reason}`);
    }
});

// Vérifier les dépendances
document.addEventListener('DOMContentLoaded', function() {
    console.log('=== Vérification des dépendances ===');
    
    // Vérifier API_CONFIG
    if (typeof API_CONFIG === 'undefined') {
        console.error('❌ API_CONFIG non défini');
    } else {
        console.log('✅ API_CONFIG:', API_CONFIG);
    }
    
    // Vérifier ProductAPI
    if (typeof ProductAPI === 'undefined') {
        console.error('❌ ProductAPI non défini');
    } else {
        console.log('✅ ProductAPI disponible');
        console.log('Méthodes ProductAPI:', Object.keys(ProductAPI));
    }
    
    // Vérifier les fonctions utilitaires
    const utils = ['getCookie', 'showNotification', 'formatPrice', 'handleApiError'];
    utils.forEach(func => {
        if (typeof window[func] === 'undefined') {
            console.error(`❌ ${func} non défini`);
        } else {
            console.log(`✅ ${func} disponible`);
        }
    });
    
    // Vérifier l'authentification
    const token = getCookie('access_token');
    if (!token) {
        console.warn('⚠️ Aucun token d\'authentification trouvé');
    } else {
        console.log('✅ Token d\'authentification présent');
    }
    
    // Test de la fonction apiCall
    console.log('=== Test de la fonction apiCall ===');
    if (typeof apiCall === 'function') {
        console.log('✅ apiCall fonction disponible');
        
        // Test simple
        apiCall('/user').then(result => {
            console.log('Test apiCall /user:', result);
        }).catch(error => {
            console.error('Erreur test apiCall:', error);
        });
    } else {
        console.error('❌ apiCall non défini');
    }
});

// Fonction de test pour les formulaires
window.testProductCreation = async function() {
    console.log('=== Test de création de produit ===');
    
    const testData = new FormData();
    testData.append('name', 'Produit Test Debug');
    testData.append('description', 'Produit créé pour le debug');
    testData.append('unit_price', '1000');
    testData.append('is_active', '1');
    
    try {
        console.log('Données de test:', Object.fromEntries(testData));
        const result = await ProductAPI.create(testData);
        console.log('Résultat création:', result);
        
        if (result.success) {
            showNotification('success', 'Test de création réussi !');
        } else {
            showNotification('error', 'Test de création échoué: ' + JSON.stringify(result));
        }
    } catch (error) {
        console.error('Erreur lors du test:', error);
        showNotification('error', 'Erreur test: ' + error.message);
    }
};

// Fonction pour afficher les détails de l'erreur
window.showDebugInfo = function() {
    const info = {
        userAgent: navigator.userAgent,
        url: window.location.href,
        cookies: document.cookie,
        localStorage: localStorage.getItem('productDraft'),
        timestamp: new Date().toISOString()
    };
    
    console.log('=== Informations de debug ===');
    console.table(info);
    
    if (typeof showNotification === 'function') {
        showNotification('info', 'Informations de debug affichées dans la console');
    }
};

console.log('=== Script de debug chargé ===');
console.log('Utilisez testProductCreation() pour tester la création');
console.log('Utilisez showDebugInfo() pour voir les informations de debug');
