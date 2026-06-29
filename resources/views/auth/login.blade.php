<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Nexus ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: #f8fafc;
        }

        .login-panel {
            width: min(100%, 430px);
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-4">
    <main class="login-panel p-4 p-md-5 shadow-lg">
        <div class="text-center mb-4">
            <div class="fs-1 text-info mb-2">
                <i class="fa-solid fa-gears"></i>
            </div>
            <h1 class="h3 fw-bold mb-1">NEXUS ERP</h1>
            <p class="text-secondary mb-0">Administrative Login</p>
        </div>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    autocomplete="email"
                    required
                    autofocus
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    autocomplete="current-password"
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input id="remember" type="checkbox" name="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember me</label>
            </div>

            <button type="submit" class="btn btn-info btn-lg w-100 fw-bold text-dark">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Sign in
            </button>
        </form>
    </main>
</body>
</html>
