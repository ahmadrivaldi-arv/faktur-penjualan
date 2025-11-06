<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{ config('app.name') }}</title>
    @vite(['resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border-radius: 16px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .brand-header {
            background: rgba(13, 110, 253, 0.85);
            color: #fff;
            padding: 32px;
            text-align: center;
        }
        .brand-header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }
        .brand-header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.85;
        }
    </style>
</head>
<body class="bg-light d-flex align-items-center min-vh-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h4 text-center mb-4">{{ config('app.name') }}</h1>
                    <p class="text-center text-muted mb-4">Silakan masuk dengan akun Anda</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email"
                                   class="form-control" value="{{ old('email','superadmin@example.com') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" value="password"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
