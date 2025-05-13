<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Progreuib</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

    <!-- Fondo animado -->
    <div class="animated-bg"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg content-wrapper">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning" href="/"><i class="bx bx-home-alt-2"></i> Progreuib</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/"><i class="bx bx-home"></i> Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="/empleos.php"><i class="bx bx-briefcase"></i> Ofertas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register/register.php"><i class="bx bx-user-plus"></i> Registro</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login/login.php"><i class="bx bx-log-in"></i> Iniciar Sesión</a></li>
                    <li class="nav-item"><a class="nav-link active disabled" href="#"><i class="bx bx-envelope"></i> Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario de contacto -->
    <div class="container py-5 content-wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-translucent p-4 shadow-lg">
                    <h2 class="text-center mb-4"><i class='bx bx-envelope'></i> Contáctanos</h2>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label"><i class='bx bx-user'></i> Nombre</label>
                                <input type="text" class="form-control" id="nombre" required placeholder="Tu nombre completo">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label"><i class='bx bx-envelope'></i> Correo</label>
                                <input type="email" class="form-control" id="email" required placeholder="ejemplo@email.com">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="asunto" class="form-label"><i class='bx bx-edit-alt'></i> Asunto</label>
                            <input type="text" class="form-control" id="asunto" required placeholder="Motivo del mensaje">
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label"><i class='bx bx-message-rounded-detail'></i> Mensaje</label>
                            <textarea class="form-control" id="mensaje" rows="5" required placeholder="Escribe tu mensaje..."></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary"><i class='bx bx-send'></i> Enviar Mensaje</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p><i class='bx bx-mail-send'></i> También puedes escribirnos a <strong>sharly@gmail.com</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5 content-wrapper">
        <div class="container">
            <h5 class="mb-3">Progreuib - Conectando Educación y Trabajo</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h6>Contacto</h6>
                    <p>Email: sharly@gmail.com</p>
                    <p>Tel: +57 312 660 2583</p>
                    <p>Ubicación: Quibdó, Chocó - Colombia</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Enlaces</h6>
                    <a href="/" class="text-white d-block">Inicio</a>
                    <a href="/empleos.php" class="text-white d-block">Ofertas</a>
                    <a href="/register/register.php" class="text-white d-block">Registro</a>
                    <a href="/login/login.php" class="text-white d-block">Iniciar Sesión</a>
                    <a href="/contact/contact.php" class="text-white d-block">Contacto</a>
                </div>
                <div class="col-md-4 mb-3">
                    <h6>Síguenos</h6>
                    <a href="#" class="text-white me-2">Facebook</a>
                    <a href="#" class="text-white me-2">Instagram</a>
                    <a href="#" class="text-white">Twitter</a>
                </div>
            </div>
            <hr class="bg-white">
            <p class="mb-0">&copy; 2025 Progreuib | Desarrollado por @sharly con amor por el Chocó 💙</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
