<?php
// Pas besoin d'ob_start() car le contrôleur gère déjà le buffer
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .text-primary-custom {
        color: var(--primary-color) !important;
    }

    .text-secondary-custom {
        color: var(--secondary-color) !important;
    }

    .bg-primary-custom {
        background-color: var(--primary-color) !important;
    }

    .bg-light-primary {
        background-color: var(--light-primary) !important;
    }

    .btn-primary-custom {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        color: white;
    }

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .filter-card {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-left: 4px solid var(--primary-color);
    }

    .table-hover tbody tr:hover {
        background-color: var(--light-primary);
        cursor: pointer;
    }

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
    }

    .badge-disponible {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-en-mission {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .badge-en-maintenance {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .badge-hors-service {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .camion-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: white;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        font-size: 0.875rem;
    }

    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
        height: 100%;
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .stats-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .stats-icon.primary {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
    }

    .stats-icon.success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .stats-icon.warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .stats-icon.info {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -20%;
        right: -10%;
        width: 120px;
        height: 120px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        z-index: 1;
    }

    .page-header .row {
        position: relative;
        z-index: 2;
    }

    .page-header-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: white !important;
    }

    .breadcrumb {
        background: none;
        padding: 0;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .breadcrumb-item a {
        color: rgba(255,255,255,0.8) !important;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: white !important;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .btn-outline-primary {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .dropdown-menu {
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        border: none;
        padding: 0.5rem 0;
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
    }

    .dropdown-item:hover {
        background-color: var(--light-primary);
        color: var(--primary-color);
    }

    .dropdown-item i {
        width: 16px;
        text-align: center;
    }

    .export-loading {
        position: relative;
        pointer-events: none;
    }

    .export-loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 16px;
        height: 16px;
        margin: -8px 0 0 -8px;
        border: 2px solid transparent;
        border-top: 2px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Toast Notifications */
    .toast-container {
        position: fixed;
        top: 2rem;
        right: 2rem;
        z-index: 10000;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        max-width: 400px;
    }

    .toast {
        background: white;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        border-left: 4px solid;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        transform: translateX(100%);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
        overflow: hidden;
    }

    .toast.show {
        transform: translateX(0);
        opacity: 1;
    }

    .toast.hide {
        transform: translateX(100%);
        opacity: 0;
    }

    .toast-success {
        border-left-color: #10b981;
        background: linear-gradient(135deg, #f0fff4 0%, #e6fffa 100%);
    }

    .toast-error {
        border-left-color: #ef4444;
        background: linear-gradient(135deg, #fef2f2 0%, #fef7f7 100%);
    }

    .toast-warning {
        border-left-color: #f59e0b;
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
    }

    .toast-info {
        border-left-color: #3b82f6;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    }

    .toast-icon {
        font-size: 1.25rem;
        margin-top: 0.125rem;
    }

    .toast-content {
        flex: 1;
    }

    .toast-title {
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
        color: #1f2937;
    }

    .toast-message {
        font-size: 0.8rem;
        color: #6b7280;
        line-height: 1.4;
    }

    .toast-close {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        background: none;
        border: none;
        font-size: 1rem;
        color: #9ca3af;
        cursor: pointer;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s ease;
    }

    .toast-close:hover {
        background-color: rgba(0,0,0,0.1);
        color: #374151;
    }

    /* Pagination */
    .pagination {
        margin: 0;
        gap: 0.25rem;
    }

    .pagination .page-link {
        border-radius: 8px;
        padding: 0.5rem 0.75rem;
        margin: 0 2px;
        border: 1px solid #e9ecef;
        font-weight: 500;
        transition: all 0.2s ease;
        min-width: 40px;
        text-align: center;
    }

    .pagination .page-link:hover {
        background-color: var(--light-primary);
        border-color: var(--primary-color);
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(240, 4, 128, 0.15);
    }

    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        box-shadow: 0 2px 8px rgba(240, 4, 128, 0.3);
    }

    .pagination .page-item.disabled .page-link {
        background-color: #f8f9fa;
        border-color: #e9ecef;
        color: #6c757d;
        cursor: not-allowed;
    }

    .pagination .page-item.disabled .page-link:hover {
        transform: none;
        box-shadow: none;
    }

    #paginationInfo {
        font-size: 0.875rem;
        white-space: nowrap;
    }

    /* Pagination at top styling */
    .card.mb-3 .card-body {
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .card.mb-3 .card-body .form-select {
        border-color: #dee2e6;
    }

    .card.mb-3 .card-body .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    @media (max-width: 576px) {
        .pagination .page-link {
            min-width: 35px;
            padding: 0.375rem 0.5rem;
            font-size: 0.875rem;
        }
        
        #paginationInfo {
            font-size: 0.8rem;
        }
    }

    /* Modal de suppression */
    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        padding: 1.5rem 1.5rem 0 1.5rem;
    }

    .modal-body {
        padding: 0 1.5rem 1.5rem 1.5rem;
    }

    .modal-footer {
        padding: 0 1.5rem 1.5rem 1.5rem;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .btn-close {
        background: none;
        border: none;
        font-size: 1.25rem;
        opacity: 0.5;
        transition: opacity 0.2s ease;
    }

    .btn-close:hover {
        opacity: 0.75;
    }

    #confirmDeleteBtn {
        background-color: #dc3545;
        border-color: #dc3545;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    #confirmDeleteBtn:hover {
        background-color: #c82333;
        border-color: #bd2130;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        transform: translateY(-1px);
    }

    /* État de chargement pour le bouton d'export */
    #exportDropdown.export-loading {
        position: relative;
        pointer-events: none;
        opacity: 0.7;
    }

    #exportDropdown.export-loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 16px;
        height: 16px;
        margin: -8px 0 0 -8px;
        border: 2px solid transparent;
        border-top: 2px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active">Camions</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">
                        <i class="bi-truck me-2"></i>Liste des Camions
                    </h1>
                    <p class="mb-0">Gérez votre flotte de véhicules</p>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-light" href="/camion/creer">
                        <i class="bi-plus-lg me-1"></i> Nouveau Camion 
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Total Camions</span>
                            <h4 class="mb-0 text-secondary-custom" id="totalCamions">-</h4>
                        </div>
                        <div class="stats-icon primary">
                            <i class="bi-truck"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Disponibles</span>
                            <h4 class="mb-0 text-success" id="camionsDisponibles">-</h4>
                        </div>
                        <div class="stats-icon success">
                            <i class="bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">En Mission</span>
                            <h4 class="mb-0 text-primary" id="camionsEnMission">-</h4>
                        </div>
                        <div class="stats-icon info">
                            <i class="bi-truck"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">En Maintenance</span>
                            <h4 class="mb-0 text-warning" id="camionsEnMaintenance">-</h4>
                        </div>
                        <div class="stats-icon warning">
                            <i class="bi-tools"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Pagination -->
        <div class="card card-custom mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3 mb-2 mb-md-0">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi-search"></i>
                            </span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Rechercher un camion...">
                        </div>
                    </div>
                    <div class="col-md-2 mb-2 mb-md-0">
                        <select class="form-select" id="statusFilter">
                            <option value="">Tous les statuts</option>
                            <option value="disponible">Disponible</option>
                            <option value="en_mission">En Mission</option>
                            <option value="en_maintenance">En Maintenance</option>
                            <option value="hors_service">Hors Service</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2 mb-md-0">
                        <select class="form-select" id="marqueFilter">
                            <option value="">Toutes les marques</option>
                            <option value="Mercedes">Mercedes</option>
                            <option value="Volvo">Volvo</option>
                            <option value="Iveco">Iveco</option>
                            <option value="Scania">Scania</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2 mb-md-0">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-download me-1"></i> Exporter
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportCamions('excel')">
                                        <i class="bi-file-earmark-excel text-success me-2"></i> Excel (.xlsx)
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportCamions('pdf')">
                                        <i class="bi-file-earmark-pdf text-danger me-2"></i> PDF
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <label for="perPageSelect" class="form-label me-2 mb-0 small">Par page:</label>
                                <select class="form-select form-select-sm" id="perPageSelect" style="width: auto;">
                                    <option value="10">10</option>
                                    <option value="25" selected>25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div id="paginationInfo" class="text-muted small"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="card card-custom">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="bi-truck me-2"></i>Camions
                    </h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="refreshCamions()">
                            <i class="bi-arrow-clockwise"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="camionsTable">
                        <thead class="table-light">
                            <tr>
                                <th>Camion</th>
                                <th>Marque/Modèle</th>
                                <th>Capacité</th>
                                <th>Statut</th>
                                <th>Créé le</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="camionsTableBody">
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                    <p class="mt-2 text-muted">Chargement des camions...</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <nav aria-label="Pagination">
                    <ul class="pagination justify-content-center mb-0" id="pagination">
                        <!-- Pagination will be generated here -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>

<!-- Toast Container -->
<div id="toastContainer"></div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-danger" id="deleteModalLabel">
                    <i class="bi-exclamation-triangle-fill me-2"></i>Confirmer la suppression
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0">
                        <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                            <i class="bi-trash text-danger" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-2">Êtes-vous sûr de vouloir supprimer ce camion ?</h6>
                        <p class="text-muted mb-3">
                            Cette action est <strong>irréversible</strong>. Le camion sera supprimé définitivement du système.
                        </p>
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center">
                                <div class="camion-avatar me-3" id="modalCamionAvatar" style="width: 40px; height: 40px; font-size: 0.875rem;">
                                    <!-- Avatar will be populated -->
                                </div>
                                <div>
                                    <div class="fw-semibold" id="modalCamionName">-</div>
                                    <small class="text-muted" id="modalCamionDetails">-</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi-x-lg me-1"></i> Annuler
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="bi-trash me-1"></i> Supprimer définitivement
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SheetJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- PDFMake Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
    let currentPage = 1;
    let perPage = 25;
    let totalPages = 1;
    let allCamions = [];
    let camionToDelete = null;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier l'authentification
        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');
        
        if (!connected || !accessToken) {
            window.location.href = '/login';
            return;
        }

        loadCamions();
        setupEventListeners();
        setupModalEventListeners();
    });

    function setupEventListeners() {
        // Search input
        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                currentPage = 1;
                loadCamions();
            }, 500);
        });

        // Filters
        document.getElementById('statusFilter').addEventListener('change', function() {
            currentPage = 1;
            loadCamions();
        });

        document.getElementById('marqueFilter').addEventListener('change', function() {
            currentPage = 1;
            loadCamions();
        });

        // Per page
        document.getElementById('perPageSelect').addEventListener('change', function() {
            perPage = parseInt(this.value);
            currentPage = 1;
            loadCamions();
        });
    }

    function setupModalEventListeners() {
        // Bouton de confirmation de suppression
        document.getElementById('confirmDeleteBtn').addEventListener('click', confirmDelete);
        
        // Réinitialiser les données quand la modal se ferme
        document.getElementById('deleteModal').addEventListener('hidden.bs.modal', function() {
            camionToDelete = null;
        });
    }

    async function loadCamions() {
        try {
            const accessToken = getCookie('access_token');
            const search = document.getElementById('searchInput').value;
            const status = document.getElementById('statusFilter').value;
            const marque = document.getElementById('marqueFilter').value;

            const queryParams = new URLSearchParams({
                page: currentPage.toString(),
                per_page: perPage.toString(),
                search: search,
                status: status,
                marque: marque
            });

            const response = await fetch(`https://toure.gestiem.com/api/camions?${queryParams}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const result = await response.json();
            console.log('Données des camions:', result);

            if (result.success && result.data) {
                allCamions = result.data.data || [];
                totalPages = result.data.last_page || 1;
                
                displayCamions(allCamions);
                updateStats(result.data);
                updatePagination(result.data);
            } else {
                throw new Error('Structure de réponse invalide');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des camions:', error);
            showError('Erreur lors du chargement des camions: ' + error.message);
        }
    }

    function displayCamions(camions) {
        const tbody = document.getElementById('camionsTableBody');
        
        if (camions.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="bi-truck text-muted" style="font-size: 3rem;"></i>
                        <p class="mt-3 text-muted">Aucun camion trouvé</p>
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = camions.map(camion => `
            <tr onclick="viewCamion('${camion.camion_id}')">
                <td>
                    <div class="d-flex align-items-center">
                        <div class="camion-avatar me-3">
                            ${getCamionInitials(camion.numero_immat)}
                        </div>
                        <div>
                            <div class="fw-semibold">${camion.numero_immat}</div>
                            <small class="text-muted">${camion.camion_id}</small>
                        </div>
                    </div>
                </td>
                <td>
                    <div>
                        <div class="fw-semibold">${camion.marque}</div>
                        <small class="text-muted">${camion.modele || 'Modèle non spécifié'}</small>
                    </div>
                </td>
                <td>
                    <span class="fw-semibold">${camion.capacite} t</span>
                </td>
                <td>
                    <span class="badge badge-status ${getStatusBadgeClass(camion.status)}">
                        ${getStatusName(camion.status)}
                    </span>
                </td>
                <td>
                    <small class="text-muted">${formatDate(camion.created_at)}</small>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation(); viewCamion('${camion.camion_id}')" title="Voir">
                            <i class="bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="event.stopPropagation(); editCamion('${camion.camion_id}')" title="Modifier">
                            <i class="bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="event.stopPropagation(); deleteCamion('${camion.camion_id}', '${camion.numero_immat}')" title="Supprimer">
                            <i class="bi-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    function getCamionInitials(numeroImmat) {
        return numeroImmat.substring(0, 2).toUpperCase();
    }

    function getStatusBadgeClass(status) {
        const statusMap = {
            'disponible': 'badge-disponible',
            'en_mission': 'badge-en-mission',
            'en_maintenance': 'badge-en-maintenance',
            'hors_service': 'badge-hors-service'
        };
        return statusMap[status] || 'badge-disponible';
    }

    function getStatusName(status) {
        const statusMap = {
            'disponible': 'Disponible',
            'en_mission': 'En Mission',
            'en_maintenance': 'En Maintenance',
            'hors_service': 'Hors Service'
        };
        return statusMap[status] || 'Inconnu';
    }

    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR');
    }

    function updateStats(data) {
        const total = data.total || 0;
        const disponible = data.data?.filter(c => c.status === 'disponible').length || 0;
        const enMission = data.data?.filter(c => c.status === 'en_mission').length || 0;
        const enMaintenance = data.data?.filter(c => c.status === 'en_maintenance').length || 0;

        document.getElementById('totalCamions').textContent = total;
        document.getElementById('camionsDisponibles').textContent = disponible;
        document.getElementById('camionsEnMission').textContent = enMission;
        document.getElementById('camionsEnMaintenance').textContent = enMaintenance;
    }

    function updatePagination(data) {
        const pagination = document.getElementById('pagination');
        const paginationInfo = document.getElementById('paginationInfo');
        
        const currentPage = data.current_page || 1;
        const lastPage = data.last_page || 1;
        const from = data.from || 0;
        const to = data.to || 0;
        const total = data.total || 0;

        // Pagination info
        paginationInfo.textContent = `${from}-${to} sur ${total}`;

        // Pagination buttons
        let paginationHTML = '';

        // Previous button
        if (currentPage > 1) {
            paginationHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">
                        <i class="bi-chevron-left"></i>
                    </a>
                </li>
            `;
        }

        // Page numbers
        const startPage = Math.max(1, currentPage - 2);
        const endPage = Math.min(lastPage, currentPage + 2);

        if (startPage > 1) {
            paginationHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="changePage(1)">1</a>
                </li>
            `;
            if (startPage > 2) {
                paginationHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            paginationHTML += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                </li>
            `;
        }

        if (endPage < lastPage) {
            if (endPage < lastPage - 1) {
                paginationHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
            }
            paginationHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="changePage(${lastPage})">${lastPage}</a>
                </li>
            `;
        }

        // Next button
        if (currentPage < lastPage) {
            paginationHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">
                        <i class="bi-chevron-right"></i>
                    </a>
                </li>
            `;
        }

        pagination.innerHTML = paginationHTML;
    }

    function changePage(page) {
        currentPage = page;
        loadCamions();
    }

    function refreshCamions() {
        loadCamions();
        showToast('Liste actualisée', 'success');
    }

    function viewCamion(camionId) {
        window.location.href = `/camion/${camionId}`;
    }

    function editCamion(camionId) {
        window.location.href = `/camion/${camionId}/modifier`;
    }

    function deleteCamion(camionId, numeroImmat) {
        // Stocker les informations du camion à supprimer
        camionToDelete = { id: camionId, numeroImmat: numeroImmat };
        
        // Remplir la modal avec les informations du camion
        document.getElementById('modalCamionAvatar').textContent = getCamionInitials(numeroImmat);
        document.getElementById('modalCamionName').textContent = numeroImmat;
        document.getElementById('modalCamionDetails').textContent = `ID: ${camionId}`;
        
        // Afficher la modal
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    async function confirmDelete() {
        if (!camionToDelete) return;

        try {
            const accessToken = getCookie('access_token');
            const response = await fetch(`https://toure.gestiem.com/api/camions/${camionToDelete.id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            // Fermer la modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            modal.hide();

            showToast('Camion supprimé avec succès', 'success');
            loadCamions();

        } catch (error) {
            console.error('Erreur lors de la suppression:', error);
            showToast('Erreur lors de la suppression: ' + error.message, 'error');
        } finally {
            camionToDelete = null;
        }
    }

    // Export functions
    async function exportCamions(format) {
        try {
            console.log('Début de l\'export:', format);
            
            // Vérifier que les bibliothèques sont chargées
            if (format === 'excel' && typeof XLSX === 'undefined') {
                throw new Error('SheetJS n\'est pas chargé. Veuillez recharger la page.');
            }
            if (format === 'pdf' && typeof pdfMake === 'undefined') {
                throw new Error('PDFMake n\'est pas chargé. Veuillez recharger la page.');
            }
            
            // Afficher un toast de chargement
            showToast('Préparation de l\'export...', 'info');
            
            // Désactiver le bouton d'export
            const exportBtn = document.getElementById('exportDropdown');
            exportBtn.disabled = true;
            exportBtn.classList.add('export-loading');
            
            if (format === 'excel') {
                await exportToExcel([]);
            } else if (format === 'pdf') {
                await exportToPDF([]);
            }
            
            showToast('Export réussi !', 'success');
            
        } catch (error) {
            console.error('Erreur d\'export:', error);
            showToast('Erreur d\'export: ' + error.message, 'error');
        } finally {
            // Réactiver le bouton d'export
            const exportBtn = document.getElementById('exportDropdown');
            exportBtn.disabled = false;
            exportBtn.classList.remove('export-loading');
        }
    }

    async function exportToExcel(data) {
        try {
            console.log('Récupération des données pour l\'export Excel...');
            const completeCamionData = await fetchCamionsFromAPI(1, 1000);
            console.log('Données complètes reçues:', completeCamionData);
            
            if (!completeCamionData.success) {
                throw new Error('Erreur lors de la récupération des données: ' + (completeCamionData.message || 'Erreur inconnue'));
            }
            
            const camions = completeCamionData.data?.data || [];
            console.log('Camions récupérés:', camions);
            
            if (camions.length === 0) {
                throw new Error('Aucun camion trouvé pour l\'export');
            }
            
            const excelData = camions.map(camion => ({
                'Immatriculation': camion.numero_immat || '',
                'Marque': camion.marque || '',
                'Modèle': camion.modele || '',
                'Capacité (t)': camion.capacite || '',
                'Statut': getStatusName(camion.status),
                'Note': camion.note || '',
                'Date de Création': camion.created_at ? new Date(camion.created_at).toLocaleDateString('fr-FR') : ''
            }));
            
            console.log('Données Excel préparées:', excelData);
            
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.json_to_sheet(excelData);
            
            // Définir les largeurs de colonnes
            ws['!cols'] = [
                { width: 20 }, // Immatriculation
                { width: 15 }, // Marque
                { width: 20 }, // Modèle
                { width: 12 }, // Capacité
                { width: 15 }, // Statut
                { width: 30 }, // Note
                { width: 15 }  // Date de Création
            ];
            
            XLSX.utils.book_append_sheet(wb, ws, 'Camions');
            
            const fileName = `camions_${new Date().toISOString().split('T')[0]}.xlsx`;
            XLSX.writeFile(wb, fileName);
            
            console.log('Export Excel terminé avec succès');
            
        } catch (error) {
            console.error('Erreur lors de l\'export Excel:', error);
            throw error;
        }
    }

    async function exportToPDF(data) {
        try {
            if (typeof pdfMake === 'undefined') {
                throw new Error('PDFMake n\'est pas chargé. Veuillez recharger la page.');
            }
            
            console.log('Récupération des données pour l\'export PDF...');
            const completeCamionData = await fetchCamionsFromAPI(1, 1000);
            console.log('Données complètes reçues pour PDF:', completeCamionData);
            
            if (!completeCamionData.success) {
                throw new Error('Erreur lors de la récupération des données: ' + (completeCamionData.message || 'Erreur inconnue'));
            }
            
            const camions = completeCamionData.data?.data || [];
            console.log('Camions récupérés pour PDF:', camions);
            
            if (camions.length === 0) {
                throw new Error('Aucun camion trouvé pour l\'export PDF');
            }
            
            await generatePDFWithPDFMake(camions);
            
            console.log('Export PDF terminé avec succès');
            
        } catch (error) {
            console.error('Erreur lors de l\'export PDF:', error);
            throw error;
        }
    }

    async function fetchCamionsFromAPI(page = 1, perPage = 100, filters = {}) {
        try {
            const accessToken = getCookie('access_token');
            const queryParams = new URLSearchParams({
                page: page.toString(),
                per_page: perPage.toString(),
                ...filters
            });

            const response = await fetch(`https://toure.gestiem.com/api/camions?${queryParams}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const result = await response.json();
            return result;
        } catch (error) {
            console.error('Erreur lors de la récupération des camions:', error);
            throw error;
        }
    }

    async function generatePDFWithPDFMake(camions) {
        const docDefinition = {
            pageSize: 'A4',
            pageOrientation: 'landscape',
            pageMargins: [20, 40, 20, 40],
            content: [
                {
                    text: 'LISTE DES CAMIONS',
                    style: 'header',
                    alignment: 'center',
                    margin: [0, 0, 0, 20]
                },
                {
                    text: `Exporté le ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR')}`,
                    style: 'subheader',
                    alignment: 'center',
                    margin: [0, 0, 0, 20]
                },
                {
                    text: `Total: ${camions.length} camion(s)`,
                    style: 'stats',
                    margin: [0, 0, 0, 20]
                },
                {
                    table: {
                        headerRows: 1,
                        widths: [80, 100, 80, 60, 100, 120, 80],
                        body: [
                            [
                                { text: 'Immatriculation', style: 'tableHeader' },
                                { text: 'Marque', style: 'tableHeader' },
                                { text: 'Modèle', style: 'tableHeader' },
                                { text: 'Capacité', style: 'tableHeader' },
                                { text: 'Statut', style: 'tableHeader' },
                                { text: 'Note', style: 'tableHeader' },
                                { text: 'Date Création', style: 'tableHeader' }
                            ],
                            ...camions.map(camion => [
                                { text: camion.numero_immat || 'N/A', style: 'tableCell' },
                                { text: camion.marque || 'N/A', style: 'tableCell' },
                                { text: camion.modele || 'N/A', style: 'tableCell' },
                                { text: camion.capacite ? `${camion.capacite} t` : 'N/A', style: 'tableCell' },
                                { text: getStatusName(camion.status), style: 'tableCell' },
                                { text: camion.note || 'N/A', style: 'tableCell' },
                                { text: camion.created_at ? new Date(camion.created_at).toLocaleDateString('fr-FR') : 'N/A', style: 'tableCell' }
                            ])
                        ]
                    },
                    layout: {
                        hLineWidth: function (i, node) { return (i === 0 || i === node.table.body.length) ? 2 : 1; },
                        vLineWidth: function (i, node) { return (i === 0 || i === node.table.widths.length) ? 2 : 1; },
                        hLineColor: function (i, node) { return (i === 0 || i === node.table.body.length) ? '#010768' : '#cccccc'; },
                        vLineColor: function (i, node) { return (i === 0 || i === node.table.widths.length) ? '#010768' : '#cccccc'; }
                    }
                }
            ],
            styles: {
                header: { fontSize: 18, bold: true, color: '#010768' },
                subheader: { fontSize: 10, color: '#666666' },
                stats: { fontSize: 12, bold: true, color: '#010768' },
                tableHeader: { fontSize: 10, bold: true, color: '#ffffff', fillColor: '#010768', alignment: 'center' },
                tableCell: { fontSize: 9, color: '#333333', alignment: 'left' }
            }
        };
        
        const fileName = `camions_${new Date().toISOString().split('T')[0]}.pdf`;
        pdfMake.createPdf(docDefinition).download(fileName);
    }

    // Toast notifications
    function showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toastContainer');
        const toastId = 'toast-' + Date.now();
        
        const icons = {
            success: 'bi-check-circle-fill',
            error: 'bi-exclamation-triangle-fill',
            warning: 'bi-exclamation-circle-fill',
            info: 'bi-info-circle-fill'
        };
        
        const toast = document.createElement('div');
        toast.id = toastId;
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <i class="bi ${icons[type]} toast-icon"></i>
            <div class="toast-content">
                <div class="toast-title">${type.charAt(0).toUpperCase() + type.slice(1)}</div>
                <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close" onclick="closeToast('${toastId}')">
                <i class="bi-x"></i>
            </button>
        `;
        
        toastContainer.appendChild(toast);
        
        // Trigger animation
        setTimeout(() => toast.classList.add('show'), 100);
        
        // Auto remove after 5 seconds
        setTimeout(() => closeToast(toastId), 5000);
    }

    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.classList.add('hide');
            setTimeout(() => toast.remove(), 300);
        }
    }

    function showError(message) {
        showToast(message, 'error');
    }
</script>

<?php
// Le contenu est directement affiché, le contrôleur récupère avec ob_get_clean()
?>