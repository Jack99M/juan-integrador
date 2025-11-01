<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - JOTA Verificador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --success-color: #059669;
            --warning-color: #d97706;
            --danger-color: #dc2626;
            --dark-color: #1e293b;
            --light-bg: #f8fafc;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin: 2rem;
            min-height: calc(100vh - 4rem);
        }
        
        .header-section {
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            color: white;
            padding: 2rem;
            border-radius: 20px 20px 0 0;
            position: relative;
            overflow: hidden;
        }
        
        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }
        
        .card-modern {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .btn-modern {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            color: white;
        }
        
        .btn-primary-modern:hover {
            background: linear-gradient(135deg, #1d4ed8, var(--primary-color));
            transform: translateY(-2px);
        }
        
        .table-modern {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .table-modern thead {
            background: linear-gradient(135deg, var(--dark-color), #334155);
            color: white;
        }
        
        .table-modern tbody tr:hover {
            background-color: rgba(37, 99, 235, 0.05);
        }
        
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }
        
        .status-active { background: rgba(5, 150, 105, 0.1); color: var(--success-color); }
        .status-inactive { background: rgba(220, 38, 38, 0.1); color: var(--danger-color); }
        .status-pending { background: rgba(217, 119, 6, 0.1); color: var(--warning-color); }
        
        .sidebar-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .nav-item-modern {
            margin-bottom: 0.5rem;
        }
        
        .nav-link-modern {
            color: var(--secondary-color);
            padding: 0.75rem 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .nav-link-modern:hover, .nav-link-modern.active {
            background: var(--primary-color);
            color: white;
            transform: translateX(5px);
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-2"><i class="fas fa-shield-alt me-3"></i>@yield('title')</h1>
                    <p class="mb-0 opacity-75">@yield('subtitle')</p>
                </div>
                <div class="text-end">
                    <a href="{{ url('/') }}" class="btn btn-light me-3" title="Volver al Dashboard">
                        <i class="fas fa-arrow-left me-2"></i>Dashboard
                    </a>
                    <div class="badge bg-light text-dark fs-6 px-3 py-2">
                        <i class="fas fa-calendar me-2"></i>{{ date('d/m/Y') }}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>