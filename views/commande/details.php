<?php ob_start(); ?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --info-color: #3b82f6;
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Fix chevauchement */
    .commande-details-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .commande-details-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .commande-details-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .commande-details-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--info-color) 0%, #2563eb 100%);
    }

    .commande-details-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .commande-details-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        background: linear-gradient(135deg, var(--info-color), #2563eb);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    }

    /* Content */
    .commande-details-content {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }

    .details-section {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .details-section:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .section-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--info-color), #2563eb);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
    }

    .detail-label {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .detail-value {
        font-size: 1rem;
        color: #374151;
        padding: 0.75rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid var(--info-color);
    }

    /* Status badges */
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    .status-en_attente {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .status-validee {
        background: rgba(59, 130, 246, 0.1);
        color: var(--info-color);
    }

    .status-en_cours {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .status-livree {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .status-partiellement_livree {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .status-annulee {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    /* Retard badge */
    .retard-badge {
        padding: 0.3rem 0.6rem;
        border-radius: 12px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        margin-top: 0.5rem;
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    /* Buttons */
    .btn-modern {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(240, 4, 128, 0.4);
    }

    .btn-outline-modern {
        background: white;
        color: var(--secondary-color);
        border: 2px solid var(--secondary-color);
    }

    .btn-outline-modern:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
    }

    .btn-secondary-modern {
        background: #6b7280;
        color: white;
    }

    .btn-secondary-modern:hover {
        background: #4b5563;
        transform: translateY(-2px);
    }

    .btn-danger-modern {
        background: var(--danger-color);
        color: white;
    }

    .btn-danger-modern:hover {
        background: #dc2626;
        transform: translateY(-2px);
    }

    .btn-success-modern {
        background: var(--success-color);
        color: white;
    }

    .btn-success-modern:hover {
        background: #059669;
        transform: translateY(-2px);
    }

    .btn-info-modern {
        background: var(--info-color);
        color: white;
    }

    .btn-info-modern:hover {
        background: #2563eb;
        transform: translateY(-2px);
    }

    /* Loading */
    .loading-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 400px;
        flex-direction: column;
        gap: 1rem;
    }

    .loading-spinner {
        width: 60px;
        height: 60px;
        border: 4px solid #f0f0f0;
        border-top-color: var(--info-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .loading-text {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.1rem;
    }

    /* Animations */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .details-grid {
            grid-template-columns: 1fr;
        }
        
        .commande-details-title {
            font-size: 2rem;
        }
    }
</style>

<div class="commande-details-wrapper font-public-sans">
    <!-- Header -->
    <div class="commande-details-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="commande-details-title">
                <div class="commande-details-icon">
                    <i class="bi bi-cart-check"></i>
                </div>
                Détails de la Commande
            </h1>
            <a href="/commandes" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="text-muted mb-0">Informations détaillées de la commande</p>
    </div>

    <!-- Loading -->
    <div id="loadingContainer" class="loading-container">
        <div class="loading-spinner"></div>
        <div class="loading-text">Chargement des détails...</div>
    </div>

    <!-- Content -->
    <div id="commandeDetailsContent" class="commande-details-content fade-in" style="display: none;">
        <!-- Informations générales -->
        <div class="details-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-info-circle"></i>
                </div>
                Informations Générales
            </h3>
            
            <div class="details-grid">
                <div class="detail-item">
                    <label class="detail-label">Numéro de commande</label>
                    <div class="detail-value" id="numeroCommande">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Fournisseur</label>
                    <div class="detail-value" id="fournisseur">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Date d'achat</label>
                    <div class="detail-value" id="dateAchat">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Montant total</label>
                    <div class="detail-value" id="montant">-</div>
                </div>
            </div>
        </div>

        <!-- Dates de livraison -->
        <div class="details-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-truck"></i>
                </div>
                Dates de Livraison
            </h3>
            
            <div class="details-grid">
                <div class="detail-item">
                    <label class="detail-label">Date de livraison prévue</label>
                    <div class="detail-value" id="dateLivraisonPrevue">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Date de livraison effective</label>
                    <div class="detail-value" id="dateLivraisonEffective">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Statut</label>
                    <div class="detail-value">
                        <span id="status" class="status-badge">-</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dates et notes -->
        <div class="details-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-calendar"></i>
                </div>
                Dates et Notes
            </h3>
            
            <div class="details-grid">
                <div class="detail-item">
                    <label class="detail-label">Date de création</label>
                    <div class="detail-value" id="createdAt">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Dernière mise à jour</label>
                    <div class="detail-value" id="updatedAt">-</div>
                </div>
            </div>
            
            <div class="detail-item" id="notesSection" style="display: none;">
                <label class="detail-label">Notes</label>
                <div class="detail-value" id="note">-</div>
            </div>
        </div>

        <!-- Actions -->
        <div class="details-section">
            <div class="d-flex gap-2 flex-wrap">
                <a href="/commande/<?php echo $commande_id; ?>/items" class="btn-modern btn-primary-modern">
                    <i class="bi bi-list"></i>
                    Voir les articles
                </a>
                <button type="button" class="btn-modern btn-success-modern" onclick="downloadBonCommande()">
                    <i class="bi bi-download"></i>
                    Télécharger le bon de commande
                </button>
                <button type="button" class="btn-modern btn-info-modern" onclick="downloadBonCommandeAvecDetails()">
                    <i class="bi bi-file-earmark-text"></i>
                    Bon avec détails
                </button>
                <a href="/commande/<?php echo $commande_id; ?>/modifier" class="btn-modern btn-primary-modern">
                    <i class="bi bi-pencil"></i>
                    Modifier
                </a>
                <button type="button" class="btn-modern btn-danger-modern" onclick="confirmDelete()">
                    <i class="bi bi-trash"></i>
                    Supprimer
                </button>
                <button type="button" class="btn-modern btn-secondary-modern" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                    Imprimer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const commandeId = '<?php echo $commande_id; ?>';
    let commandeData = null;

    document.addEventListener('DOMContentLoaded', function() {
        loadCommandeDetails();
    });

    async function loadCommandeDetails() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                return;
            }

            const response = await fetch(`https://toure.gestiem.com/api/commandes/${commandeId}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Détails de la commande:', result);
                
                commandeData = result.data;
                displayCommandeDetails();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('commandeDetailsContent').style.display = 'block';
            } else {
                console.error('Erreur API:', response.status, response.statusText);
                const errorResult = await response.json();
                console.error('Détails erreur:', errorResult);
                throw new Error('Erreur lors du chargement des détails');
            }
        } catch (error) {
            console.error('Erreur:', error);
            document.getElementById('loadingContainer').style.display = 'none';
            // Afficher un message d'erreur
        }
    }

    function displayCommandeDetails() {
        if (!commandeData) return;

        // Informations générales
        document.getElementById('numeroCommande').textContent = commandeData.numero_commande || 'N/A';
        document.getElementById('fournisseur').textContent = commandeData.fournisseur?.name || 'N/A';
        document.getElementById('dateAchat').textContent = formatDate(commandeData.date_achat);
        document.getElementById('montant').textContent = formatCurrency(commandeData.montant);

        // Dates de livraison
        const dateLivraisonPrevue = formatDate(commandeData.date_livraison_prevue);
        document.getElementById('dateLivraisonPrevue').innerHTML = `
            ${dateLivraisonPrevue}
            ${isCommandeEnRetard(commandeData) ? '<span class="retard-badge">En retard</span>' : ''}
        `;
        
        const dateLivraisonEffective = commandeData.date_livraison_effective 
            ? formatDate(commandeData.date_livraison_effective) 
            : 'Non livrée';
        document.getElementById('dateLivraisonEffective').textContent = dateLivraisonEffective;

        // Statut
        document.getElementById('status').textContent = getStatusLabel(commandeData.status);
        document.getElementById('status').className = `status-badge status-${commandeData.status || 'en_attente'}`;

        // Dates et notes
        document.getElementById('createdAt').textContent = formatDateTime(commandeData.created_at);
        document.getElementById('updatedAt').textContent = formatDateTime(commandeData.updated_at);

        // Notes
        if (commandeData.note) {
            document.getElementById('note').textContent = commandeData.note;
            document.getElementById('notesSection').style.display = 'block';
        }
    }

    function getStatusLabel(status) {
        const labels = {
            'en_attente': 'En attente',
            'validee': 'Validée',
            'en_cours': 'En cours',
            'livree': 'Livrée',
            'partiellement_livree': 'Partiellement livrée',
            'annulee': 'Annulée'
        };
        return labels[status] || status;
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        }).format(date);
    }

    function formatDateTime(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
        }).format(date);
    }

    function formatCurrency(amount) {
        if (!amount) return '0,00 FCFA';
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 2
        }).format(amount).replace('XOF', 'FCFA');
    }

    function isCommandeEnRetard(commande) {
        if (!commande.date_livraison_prevue) return false;
        const dateLivraisonPrevue = new Date(commande.date_livraison_prevue);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        // Une commande est en retard si la date de livraison prévue est dépassée
        // et qu'elle n'est pas encore livrée
        return dateLivraisonPrevue < today && 
               commande.status !== 'livree' && 
               commande.status !== 'annulee';
    }

    function confirmDelete() {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette commande ? Cette action est irréversible.')) {
            // Rediriger vers la page de suppression
            window.location.href = `/commande/${commandeId}/supprimer`;
        }
    }

    async function downloadBonCommande() {
        if (!commandeData) {
            alert('Données de la commande non disponibles');
            return;
        }

        try {
            // Afficher un indicateur de chargement
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="bi bi-hourglass-split"></i> Génération en cours...';
            button.disabled = true;

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                throw new Error('Token d\'accès manquant');
            }

            // Générer le PDF côté client avec jsPDF
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Configuration du document
            const pageWidth = doc.internal.pageSize.getWidth();
            const margin = 20;
            let yPosition = margin;

            // Fonction pour ajouter du texte avec style
            function addText(text, x, y, options = {}) {
                const fontSize = options.fontSize || 10;
                const fontStyle = options.fontStyle || 'normal';
                const align = options.align || 'left';
                
                doc.setFontSize(fontSize);
                doc.setFont('helvetica', fontStyle);
                doc.text(text, x, y);
            }

            // En-tête du document
            addText('BON DE COMMANDE', pageWidth / 2, yPosition, { fontSize: 18, fontStyle: 'bold', align: 'center' });
            yPosition += 15;

            addText('Société: TOURE LOGISTICS', pageWidth / 2, yPosition, { fontSize: 12, align: 'center' });
            yPosition += 10;

            addText('Adresse: Cotonou, Bénin', pageWidth / 2, yPosition, { fontSize: 10, align: 'center' });
            yPosition += 10;

            addText('Tél: +229 XX XX XX XX', pageWidth / 2, yPosition, { fontSize: 10, align: 'center' });
            yPosition += 20;

            // Ligne de séparation
            doc.line(margin, yPosition, pageWidth - margin, yPosition);
            yPosition += 10;

            // Informations de la commande
            addText('INFORMATIONS DE LA COMMANDE', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
            yPosition += 10;

            // Numéro de commande
            addText('N° Commande:', margin, yPosition);
            addText(commandeData.numero_commande || 'N/A', margin + 40, yPosition, { fontStyle: 'bold' });
            yPosition += 8;

            // Date d'achat
            addText('Date d\'achat:', margin, yPosition);
            addText(formatDate(commandeData.date_achat), margin + 40, yPosition);
            yPosition += 8;

            // Date de livraison prévue
            addText('Livraison prévue:', margin, yPosition);
            addText(formatDate(commandeData.date_livraison_prevue), margin + 40, yPosition);
            yPosition += 8;

            // Statut
            addText('Statut:', margin, yPosition);
            addText(getStatusLabel(commandeData.status), margin + 40, yPosition, { fontStyle: 'bold' });
            yPosition += 15;

            // Informations du fournisseur
            if (commandeData.fournisseur) {
                addText('INFORMATIONS DU FOURNISSEUR', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
                yPosition += 10;

                addText('Nom:', margin, yPosition);
                addText(commandeData.fournisseur.name || 'N/A', margin + 20, yPosition, { fontStyle: 'bold' });
                yPosition += 8;

                if (commandeData.fournisseur.email) {
                    addText('Email:', margin, yPosition);
                    addText(commandeData.fournisseur.email, margin + 25, yPosition);
                    yPosition += 8;
                }

                if (commandeData.fournisseur.phone) {
                    addText('Téléphone:', margin, yPosition);
                    addText(commandeData.fournisseur.phone, margin + 30, yPosition);
                    yPosition += 8;
                }

                if (commandeData.fournisseur.adresse) {
                    addText('Adresse:', margin, yPosition);
                    addText(commandeData.fournisseur.adresse, margin + 30, yPosition);
                    yPosition += 8;
                }
                yPosition += 10;
            }

            // Montant
            addText('MONTANT TOTAL', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
            yPosition += 10;

            addText('Montant:', margin, yPosition);
            addText(formatCurrency(commandeData.montant), pageWidth - margin - 30, yPosition, { fontSize: 12, fontStyle: 'bold', align: 'right' });
            yPosition += 15;

            // Notes si disponibles
            if (commandeData.note) {
                addText('NOTES', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
                yPosition += 10;

                const noteLines = doc.splitTextToSize(commandeData.note, pageWidth - 2 * margin);
                doc.text(noteLines, margin, yPosition);
                yPosition += noteLines.length * 5 + 10;
            }

            // Pied de page
            yPosition = doc.internal.pageSize.getHeight() - 30;
            addText('Document généré le ' + new Date().toLocaleDateString('fr-FR'), pageWidth / 2, yPosition, { fontSize: 8, align: 'center' });

            // Nom du fichier
            const fileName = `Bon_Commande_${commandeData.numero_commande || commandeId}_${new Date().toISOString().split('T')[0]}.pdf`;

            // Télécharger le PDF
            doc.save(fileName);

            // Restaurer le bouton
            button.innerHTML = originalText;
            button.disabled = false;

        } catch (error) {
            console.error('Erreur lors de la génération du PDF:', error);
            alert('Erreur lors de la génération du bon de commande: ' + error.message);
            
            // Restaurer le bouton en cas d'erreur
            const button = event.target;
            button.innerHTML = '<i class="bi bi-download"></i> Télécharger le bon de commande';
            button.disabled = false;
        }
    }

    async function downloadBonCommandeAvecDetails() {
        if (!commandeData) {
            alert('Données de la commande non disponibles');
            return;
        }

        try {
            // Afficher un indicateur de chargement
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="bi bi-hourglass-split"></i> Génération en cours...';
            button.disabled = true;

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                throw new Error('Token d\'accès manquant');
            }

            // Charger les détails de la commande
            const response = await fetch(`https://toure.gestiem.com/api/detail-commandes/commande/${commandeId}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            let detailsData = null;
            if (response.ok) {
                const result = await response.json();
                detailsData = result.data;
            }

            // Générer le PDF côté client avec jsPDF
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Configuration du document
            const pageWidth = doc.internal.pageSize.getWidth();
            const margin = 20;
            let yPosition = margin;

            // Fonction pour ajouter du texte avec style
            function addText(text, x, y, options = {}) {
                const fontSize = options.fontSize || 10;
                const fontStyle = options.fontStyle || 'normal';
                const align = options.align || 'left';
                
                doc.setFontSize(fontSize);
                doc.setFont('helvetica', fontStyle);
                doc.text(text, x, y);
            }

            // En-tête du document
            addText('BON DE COMMANDE DÉTAILLÉ', pageWidth / 2, yPosition, { fontSize: 18, fontStyle: 'bold', align: 'center' });
            yPosition += 15;

            addText('Société: TOURE LOGISTICS', pageWidth / 2, yPosition, { fontSize: 12, align: 'center' });
            yPosition += 10;

            addText('Adresse: Cotonou, Bénin', pageWidth / 2, yPosition, { fontSize: 10, align: 'center' });
            yPosition += 10;

            addText('Tél: +229 XX XX XX XX', pageWidth / 2, yPosition, { fontSize: 10, align: 'center' });
            yPosition += 20;

            // Ligne de séparation
            doc.line(margin, yPosition, pageWidth - margin, yPosition);
            yPosition += 10;

            // Informations de la commande
            addText('INFORMATIONS DE LA COMMANDE', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
            yPosition += 10;

            // Numéro de commande
            addText('N° Commande:', margin, yPosition);
            addText(commandeData.numero_commande || 'N/A', margin + 40, yPosition, { fontStyle: 'bold' });
            yPosition += 8;

            // Date d'achat
            addText('Date d\'achat:', margin, yPosition);
            addText(formatDate(commandeData.date_achat), margin + 40, yPosition);
            yPosition += 8;

            // Date de livraison prévue
            addText('Livraison prévue:', margin, yPosition);
            addText(formatDate(commandeData.date_livraison_prevue), margin + 40, yPosition);
            yPosition += 8;

            // Statut
            addText('Statut:', margin, yPosition);
            addText(getStatusLabel(commandeData.status), margin + 40, yPosition, { fontStyle: 'bold' });
            yPosition += 15;

            // Informations du fournisseur
            if (commandeData.fournisseur) {
                addText('INFORMATIONS DU FOURNISSEUR', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
                yPosition += 10;

                addText('Nom:', margin, yPosition);
                addText(commandeData.fournisseur.name || 'N/A', margin + 20, yPosition, { fontStyle: 'bold' });
                yPosition += 8;

                if (commandeData.fournisseur.email) {
                    addText('Email:', margin, yPosition);
                    addText(commandeData.fournisseur.email, margin + 25, yPosition);
                    yPosition += 8;
                }

                if (commandeData.fournisseur.phone) {
                    addText('Téléphone:', margin, yPosition);
                    addText(commandeData.fournisseur.phone, margin + 30, yPosition);
                    yPosition += 8;
                }

                if (commandeData.fournisseur.adresse) {
                    addText('Adresse:', margin, yPosition);
                    addText(commandeData.fournisseur.adresse, margin + 30, yPosition);
                    yPosition += 8;
                }
                yPosition += 15;
            }

            // Détails des articles
            if (detailsData && detailsData.details && detailsData.details.length > 0) {
                addText('DÉTAILS DES ARTICLES', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
                yPosition += 10;

                // En-tête du tableau
                const tableStartY = yPosition;
                const colWidths = [60, 80, 30, 40, 50];
                const colPositions = [margin, margin + colWidths[0], margin + colWidths[0] + colWidths[1], margin + colWidths[0] + colWidths[1] + colWidths[2], margin + colWidths[0] + colWidths[1] + colWidths[2] + colWidths[3]];

                // En-têtes
                addText('Produit', colPositions[0], yPosition, { fontSize: 9, fontStyle: 'bold' });
                addText('Description', colPositions[1], yPosition, { fontSize: 9, fontStyle: 'bold' });
                addText('Qté', colPositions[2], yPosition, { fontSize: 9, fontStyle: 'bold' });
                addText('Prix unit.', colPositions[3], yPosition, { fontSize: 9, fontStyle: 'bold' });
                addText('Total', colPositions[4], yPosition, { fontSize: 9, fontStyle: 'bold' });
                yPosition += 8;

                // Ligne de séparation
                doc.line(margin, yPosition, pageWidth - margin, yPosition);
                yPosition += 5;

                // Articles
                detailsData.details.forEach(detail => {
                    // Vérifier si on a besoin d'une nouvelle page
                    if (yPosition > doc.internal.pageSize.getHeight() - 40) {
                        doc.addPage();
                        yPosition = margin;
                    }

                    addText(detail.product?.code || 'N/A', colPositions[0], yPosition, { fontSize: 8 });
                    addText(detail.product?.name || 'N/A', colPositions[1], yPosition, { fontSize: 8 });
                    addText(detail.quantite?.toString() || '0', colPositions[2], yPosition, { fontSize: 8 });
                    addText(formatCurrency(detail.prix_unitaire), colPositions[3], yPosition, { fontSize: 8 });
                    addText(formatCurrency(detail.sous_total), colPositions[4], yPosition, { fontSize: 8 });
                    yPosition += 8;
                });

                yPosition += 10;
            }

            // Montant total
            addText('MONTANT TOTAL', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
            yPosition += 10;

            addText('Montant:', margin, yPosition);
            addText(formatCurrency(commandeData.montant), pageWidth - margin - 30, yPosition, { fontSize: 12, fontStyle: 'bold', align: 'right' });
            yPosition += 15;

            // Notes si disponibles
            if (commandeData.note) {
                addText('NOTES', margin, yPosition, { fontSize: 14, fontStyle: 'bold' });
                yPosition += 10;

                const noteLines = doc.splitTextToSize(commandeData.note, pageWidth - 2 * margin);
                doc.text(noteLines, margin, yPosition);
                yPosition += noteLines.length * 5 + 10;
            }

            // Pied de page
            yPosition = doc.internal.pageSize.getHeight() - 30;
            addText('Document généré le ' + new Date().toLocaleDateString('fr-FR'), pageWidth / 2, yPosition, { fontSize: 8, align: 'center' });

            // Nom du fichier
            const fileName = `Bon_Commande_Detaille_${commandeData.numero_commande || commandeId}_${new Date().toISOString().split('T')[0]}.pdf`;

            // Télécharger le PDF
            doc.save(fileName);

            // Restaurer le bouton
            button.innerHTML = originalText;
            button.disabled = false;

        } catch (error) {
            console.error('Erreur lors de la génération du PDF détaillé:', error);
            alert('Erreur lors de la génération du bon de commande détaillé: ' + error.message);
            
            // Restaurer le bouton en cas d'erreur
            const button = event.target;
            button.innerHTML = '<i class="bi bi-file-earmark-text"></i> Bon avec détails';
            button.disabled = false;
        }
    }
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
