<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progreuib - Conectando Educación y Trabajo</title>
    <link rel="icon" href="img/icono.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <video autoplay muted loop class="video-background">
        <source src="mp4/Quibdó - Chocó cinematic video..mp4" type="video/mp4">
        Tu navegador no soporta videos en HTML5.
    </video>
    <div class="bg-overlay"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient shadow-sm fixed-top" style="background: linear-gradient(90deg, #003566, #0077b6);">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center fs-4" href="http://progreuib.edu.co/">
                <img src="img/icono.jpeg" alt="Logo" width="28" height="28" class="me-2 rounded-circle" style="border-radius: 50%; object-fit: cover;">
                Progreuib
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav fs-5 gap-2">
                    <li class="nav-item">
                        <a class="nav-link active text-warning fw-semibold" href="index.php">
                            <i class='bx bx-home'></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="ofertas/ofertas.php">
                            <i class='bx bx-briefcase'></i> Ofertas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="register/register.php">
                            <i class='bx bx-user-plus'></i> Registro
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="login/login.php">
                            <i class='bx bx-log-in'></i> Iniciar Sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="contact/contact.php">
                            <i class='bx bx-envelope'></i> Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <header class="hero-section position-relative d-flex align-items-center justify-content-center text-white text-center">
        <video autoplay muted loop class="position-absolute w-100 h-100 object-fit-cover z-n1">
            <source src="mp4/Quibdó - Chocó cinematic video..mp4" type="video/mp4">
            Tu navegador no soporta videos en HTML5.
        </video>
        <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>

        <div class="container py-5">
            <h1 class="display-2 fw-bold text-warning">Progreuib</h1>
            <p class="lead fs-4 fst-italic text-white">Educación con propósito, trabajo con impacto. ¡Construyamos el cambio desde el Chocó!</p>
            <a href="register/register.php" class="btn btn-warning btn-lg px-5 fs-5 fw-semibold">Comenzar Ahora</a>
        </div>
    </header>

    <div class="container py-5 content-wrapper">
        <h2 class="text-center text-light fw-bold mb-4">Encuentra la oportunidad ideal para ti</h2>
        <div class="card shadow-lg p-4 border-0 bg-white rounded-4">
            <form action="empleos.php" method="GET" class="row g-3 align-items-center justify-content-center">
                <div class="col-md-8">
                    <label for="area" class="form-label fw-semibold">Área profesional</label>
                    <select name="q" id="area" class="form-select form-select-lg">
                        <option value="">Selecciona un área</option>
                        <option value="Programador">Programador</option>
                        <option value="Docente">Docente</option>
                        <option value="Analista de Datos">Analista de Datos</option>
                        <option value="Diseñador Gráfico">Diseñador Gráfico</option>
                        <option value="Ingeniero de Software">Ingeniero de Software</option>
                        <option value="Soporte Técnico">Soporte Técnico</option>
                        <option value="Administrador de Redes">Administrador de Redes</option>
                        <option value="Community Manager">Community Manager</option>
                        <option value="Marketing Digital">Marketing Digital</option>
                        <option value="Contador">Contador</option>
                        <option value="Asistente Administrativo">Asistente Administrativo</option>
                        <option value="Gestor de Proyectos">Gestor de Proyectos</option>
                        <option value="Psicólogo Organizacional">Psicólogo Organizacional</option>
                        <option value="Redactor de Contenidos">Redactor de Contenidos</option>
                        <option value="Especialista en Recursos Humanos">Especialista en Recursos Humanos</option>
                    </select>
                </div>
                <div class="col-md-4 d-grid">
                    <label class="invisible">Botón de búsqueda</label>
                    <button type="submit" class="btn btn-primary btn-lg"><i class='bx bx-search'></i> Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container py-5 content-wrapper">
        <h2 class="text-center text-light fw-bold mb-4">Últimas Ofertas de Trabajo</h2>
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">Desarrollador Web</h5>
                        <p class="card-text">Empresa X | Jornada completa</p>
                        <a href="detalle_empleo.php?id=1" class="btn btn-outline-primary w-100">Ver Detalles</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">Docente de Matemáticas</h5>
                        <p class="card-text">Colegio Y | Medio tiempo</p>
                        <a href="detalle_empleo.php?id=2" class="btn btn-outline-primary w-100">Ver Detalles</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">Analista de Datos</h5>
                        <p class="card-text">Compañía Z | Modalidad remota</p>
                        <a href="detalle_empleo.php?id=3" class="btn btn-outline-primary w-100">Ver Detalles</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mt-4">
            <a href="empleos.php" class="btn btn-secondary btn-lg">Ver todas las ofertas</a>
        </div>
    </div>

    <footer class="footer text-white pt-5 pb-4" style="background: linear-gradient(90deg, #003566, #0077b6);">
        <div class="container text-center text-md-start">
            <div class="row">

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">
                        <i class='bx bx-book-heart me-2'></i>Progreuib
                    </h5>
                    <p>Conectando Educación y Trabajo desde el corazón del Chocó.</p>
                    <p><i class='bx bx-envelope'></i> sharly@gmail.com</p>
                    <p><i class='bx bx-phone'></i> +57 312 660 2583</p>
                    <p><i class='bx bx-map'></i> Quibdó, Chocó - Colombia</p>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Navegación</h6>
                    <a href="index.php" class="text-white d-block mb-2"><i class='bx bx-chevron-right'></i> Inicio</a>
                    <a href="empleos.php" class="text-white d-block mb-2"><i class='bx bx-chevron-right'></i> Ofertas</a>
                    <a href="register/register.php" class="text-white d-block mb-2"><i class='bx bx-chevron-right'></i> Registro</a>
                    <a href="login.php" class="text-white d-block mb-2"><i class='bx bx-chevron-right'></i> Iniciar Sesión</a>
                    <a href="contacto.php" class="text-white d-block"><i class='bx bx-chevron-right'></i> Contacto</a>
                </div>

                <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-md-0 mb-4 text-center">
                    <h6 class="text-uppercase fw-bold mb-4">Síguenos</h6>
                    <a href="#" class="btn btn-outline-light btn-floating m-1" role="button"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="btn btn-outline-light btn-floating m-1" role="button"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="btn btn-outline-light btn-floating m-1" role="button"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="btn btn-outline-light btn-floating m-1" role="button"><i class='bx bxl-linkedin'></i></a>
                    <p class="mt-3">¡Vamos juntos por el progreso educativo del Chocó!</p>
                </div>
            </div>

            <hr class="bg-light">

            <div class="text-center mt-3">
                <p class="mb-0">&copy; 2025 <strong>Progreuib</strong>. Todos los derechos reservados a @sharly 💙.</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>

</body>

</html>