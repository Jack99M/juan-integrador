<style>
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --danger-gradient: linear-gradient(135deg, #fc466b 0%, #3f5efb 100%);
    --admin-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --reportero-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    --analista-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}

.main-header {
    background: var(--primary-gradient) !important;
    border: none !important;
    box-shadow: 0 2px 20px rgba(0,0,0,0.1) !important;
}

.main-sidebar {
    background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%) !important;
    box-shadow: 2px 0 20px rgba(0,0,0,0.1) !important;
}

.brand-link {
    background: rgba(255,255,255,0.1) !important;
    border-bottom: 1px solid rgba(255,255,255,0.1) !important;
}

.nav-sidebar .nav-link {
    border-radius: 10px !important;
    margin: 2px 8px !important;
    transition: all 0.3s ease !important;
}

.nav-sidebar .nav-link:hover {
    background: rgba(255,255,255,0.1) !important;
    transform: translateX(5px) !important;
}

.card {
    border: none !important;
    border-radius: 15px !important;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1) !important;
    transition: all 0.3s ease !important;
}

.card:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 35px rgba(0,0,0,0.15) !important;
}

.card-primary .card-header {
    background: var(--primary-gradient) !important;
    border: none !important;
    border-radius: 15px 15px 0 0 !important;
}

.btn {
    border-radius: 25px !important;
    padding: 8px 20px !important;
    font-weight: 500 !important;
    transition: all 0.3s ease !important;
}

.btn-primary {
    background: var(--primary-gradient) !important;
    border: none !important;
}

.btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
}

.content-wrapper {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) !important;
}

/* Estilos específicos por rol */
.layout-admin .main-header {
    background: var(--admin-gradient) !important;
}

.layout-reportero .main-header {
    background: var(--reportero-gradient) !important;
}

.layout-analista .main-header {
    background: var(--analista-gradient) !important;
}
</style>