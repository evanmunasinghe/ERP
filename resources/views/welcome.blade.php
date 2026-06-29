<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Industrial ERP System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .hero-section {
            padding: 5rem 0 3rem 0;
        }
        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            transition: transform 0.2s, background 0.2s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.08);
        }
        .system-badge {
            background-color: #38bdf8;
            color: #0f172a;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent pt-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4 text-white" href="#">
                <i class="fa-solid fa-gears text-info me-2"></i> NEXUS ERP
            </a>
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-light px-4 py-2 fw-semibold rounded-pill shadow-sm">
                    <i class="fa-solid fa-right-to-bracket me-2"></i> Administrative Login
                </a>
            </div>
        </div>
    </nav>

    <div class="container hero-section my-auto">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start">
                <span class="badge system-badge px-3 py-2 mb-3 rounded-pill">v1.0 Production Platform</span>
                <h1 class="display-4 fw-extrabold text-white mb-3">
                    Industrial Resource <br><span class="text-info">Planning & Inventory</span>
                </h1>
                <p class="lead text-secondary mb-4 fs-5">
                    A centralized operations environment designed to track internal team structures, manage customer logs, trace raw product stock metrics, and process transactional invoicing seamlessly.
                </p>
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                    <a href="{{ route('login') }}" class="btn btn-info btn-lg px-5 py-3 fw-bold rounded-pill text-dark shadow">
                        Enter Workspace <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-4 feature-card h-100">
                            <div class="text-info mb-3 fs-3"><i class="fa-solid fa-users-gear"></i></div>
                            <h5 class="text-white fw-bold">User Management</h5>
                            <p class="text-muted small mb-0">Role assignment variables and secure access control panels for active enterprise users.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 feature-card h-100">
                            <div class="text-info mb-3 fs-3"><i class="fa-solid fa-address-book"></i></div>
                            <h5 class="text-white fw-bold">Customer Directory</h5>
                            <p class="text-muted small mb-0">Complete CRM logging infrastructure monitoring billing vectors, phone records, and physical routing addresses.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 feature-card h-100">
                            <div class="text-info mb-3 fs-3"><i class="fa-solid fa-boxes-stacked"></i></div>
                            <h5 class="text-white fw-bold">Live Stock Tracking</h5>
                            <p class="text-muted small mb-0">Granular warehousing audits capturing unique product ledger codes, historical manufacturing costs, and live margins.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 feature-card h-100">
                            <div class="text-info mb-3 fs-3"><i class="fa-solid fa-receipt"></i></div>
                            <h5 class="text-white fw-bold">Atomic Invoicing</h5>
                            <p class="text-muted small mb-0">Automated ledger processing directly synchronized with warehouse stocks via database transactions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-auto py-4 bg-black bg-opacity-25 border-top border-secondary border-opacity-10 text-center text-muted small">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <div>
                &copy; {{ date('Y') }} Nexus Industrial Systems. Authorized System Personnel Access Only.
            </div>
            <div class="d-flex gap-4">
                <span><i class="fa-solid fa-circle text-success me-1 small"></i> DB Server: Connected</span>
                <span><i class="fa-solid fa-shield-halved text-info me-1 small"></i> SSL Active</span>
            </div>
        </div>
    </footer>

</body>
</html>