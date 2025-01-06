<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/vector-gratis/fondo-futurista-degradado-creativo_23-2149136590.jpg'); /* Reemplaza la URL con la de tu imagen */
            background-size: cover;
            background-repeat: no-repeat;
        }
        .container-box {
            background-color: rgba(255, 255, 255, 0.8); /* Color de fondo con transparencia */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: auto;
            max-width: 500px;
        }
        .title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #c80fed;
            border-color: #832592;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary:hover {
            background-color: #c705a0;
            border-color: #9a0290;
        }
        .btn-link {
            color: #650bdb;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .btn-link:hover {
            color: #042475;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="container-box">
            <h1 class="title text-center">Bienvenido</h1>
            <!-- Usamos un enlace en lugar de un formulario -->
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg d-block mb-3">Iniciar Sesión</a>
            <p class="text-center mb-0">¿No tienes una cuenta? <a href="{{ route('register') }}" class="btn-link">Registrarse</a></p>
        </div>
    </div>
</body>
</html>

