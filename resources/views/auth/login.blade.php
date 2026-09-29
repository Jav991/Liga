<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LIGA GAMER - Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>
    <body>
        <div class="login-wrapper">
            <div class="login-header">
                <div class="login-logo-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <span class="login-title-brand">LIGA <span>GAMER</span></span>
            </div>

            <div class="login-card">
                <div class="login-card-header">
                    <h2>ACCESO <span>PRIVADO</span></h2>
                    <p>Identifícate para gestionar la competición</p>
                </div>

                @if ($errors->any())
                    <div class="alert-errors">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password" name="password" required class="form-input">
                    </div>

                    <div class="remember-container">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember">
                            <span>Recordar equipo</span>
                        </label>
                    </div>

                    <button type="submit" class="btn-login">ENTRAR AL SISTEMA</button>
                </form>
            </div>
        </div>

    </body>
</html>