<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Progreuib - Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/style.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-DuhbZG3q5ZkOb8z9gHFnWFSNdTGHZrDN3OdZT6LXL+an2n0VN7JEXRHFLz9heEFTo2FXCBWfJkYhx7RYXzvbDQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning" href="/">
                <i class="bx bx-home-alt-2"></i> Progreuib
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="bx bx-home"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/empleos.php"><i class="bx bx-briefcase"></i> Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register/register.php"><i class="bx bx-user-plus"></i> Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active disabled" href="#"><i class="bx bx-log-in"></i> Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact/contact.php"><i class="bx bx-envelope"></i> Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Video de fondo -->
    <video autoplay muted loop class="video-background">
        <source src="../mp4/Quibdó - Chocó cinematic video..mp4" type="video/mp4">
        Tu navegador no soporta el video HTML5.
    </video>
    <div class="overlay"></div>

    <!-- Login Form -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="card shadow-lg border-0 p-5 rounded-4" style="max-width: 480px; width: 100%;">

            <?php
            $mensaje = $_GET['mensaje'] ?? '';
            $mensaje_clase = $_GET['clase'] ?? '';
            ?>

            <?php if ($mensaje): ?>
                <div class="container mt-3">
                    <div class="alert <?php echo htmlspecialchars($mensaje_clase); ?> alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($mensaje); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div id="loginError" class="alert alert-danger text-center fw-semibold fade show" role="alert">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>

            <h3 class="text-center fw-bold mb-4 fs-2 text-primary-emphasis d-flex justify-content-center align-items-center gap-2">
                <i class="fas fa-right-to-bracket fa-lg text-primary"></i>
                Iniciar Sesión
            </h3>

            <form action="validacion/validacion.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">
                        <i class='bx bx-envelope'></i> Correo electrónico
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                        <input type="email" class="form-control" id="email" name="correo" placeholder="ejemplo@correo.com"
                            value="<?php echo htmlspecialchars($_POST['correo'] ?? ''); ?>" required />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">
                        <i class='bx bx-lock'></i> Contraseña
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class='bx bx-lock'></i></span>
                        <input type="password" class="form-control" id="password" name="contraseña"
                            placeholder="••••••••"
                            value="<?php echo htmlspecialchars($_POST['contrasena'] ?? ''); ?>" required />
                        <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                            <i class='bx bx-show' id="togglePasswordIcon"></i>
                        </span>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary fs-4 fw-semibold text-white shadow-sm">
                        <i class='bx bx-log-in'></i> Ingresar
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p><i class='bx bx-user-plus'></i> ¿No tienes cuenta?
                    <a href="http://progreuib.edu.co/register/register.php"
                        class="fw-semibold text-decoration-none" style="color: #408bff;">
                        Regístrate aquí
                    </a>
                </p>
            </div>

        </div>
    </div>


    <footer class="footer text-center">
        <div class="container">
            <p class="mb-1">© 2025 Progreuib. Todos los derechos reservados.</p>
            <p class="mb-0">
                <a href="#">Política de privacidad</a> |
                <a href="#">Términos de uso</a>
            </p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const errorAlert = document.getElementById('loginError');
            if (errorAlert) {
                setTimeout(() => {
                    errorAlert.style.display = 'none';
                }, 3000); // 3 segundos
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="funtion/funtion.js"></script>
</body>

</html>