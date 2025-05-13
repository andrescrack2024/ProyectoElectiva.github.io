<?php
session_start();
include("../conex.php");

if (!isset($_SESSION['Rol']) || $_SESSION['Rol'] !== 'Administrador') {
    header("Location: ../login.php?mensaje=Acceso no autorizado&clase=alert-danger");
    exit;
}

if (isset($_GET['eliminar_usuario'])) {
    $idUsuario = $_GET['eliminar_usuario'];
    $conexion->query("DELETE FROM usuarios WHERE ID = $idUsuario");
    header("Location: admin.php");
    exit;
}

if (isset($_GET['eliminar_empresa'])) {
    $idEmpresa = $_GET['eliminar_empresa'];
    $conexion->query("DELETE FROM empresas WHERE ID = $idEmpresa");
    header("Location: admin.php");
    exit;
}

if (isset($_GET['eliminar_oferta'])) {
    $idOferta = $_GET['eliminar_oferta'];
    $conexion->query("DELETE FROM ofertas WHERE ID = $idOferta");
    header("Location: admin.php");
    exit;
}

$usuarios = $conexion->query("SELECT * FROM usuarios");
$empresas = $conexion->query("SELECT * FROM empresas");
$ofertas = $conexion->query("SELECT o.*, e.Nombre AS empresa_nombre FROM ofertas o JOIN empresas e ON o.Empresa_id = e.ID");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Admin - ProgreUIB</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('../../img/admin.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            color: #000;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.92);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }

        .card-header {
            font-weight: bold;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        h2 {
            color: #fff;
            text-shadow: 2px 2px 4px #000;
        }

        footer {
            background: linear-gradient(to right, #003049, #1d3557);
            color: white;
            padding: 15px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">🔧 Admin - ProgreUIB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin"
                aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php">🏠 Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">🌐 Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="../logout.php">⛔ Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center mb-4">🎉 Bienvenido al Panel de Administración</h2>

        <!-- Usuarios -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                👥 Usuarios Registrados
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($u = $usuarios->fetch_assoc()): ?>
                            <tr>
                                <td><?= $u['ID'] ?></td>
                                <td><?= $u['Nombre'] ?></td>
                                <td><?= $u['Correo'] ?></td>
                                <td><?= $u['Rol'] ?></td>
                                <td>
                                    <a href="editar_usuario.php?id=<?= $u['ID'] ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                                    <a href="ver_usuario.php?id=<?= $u['ID'] ?>" class="btn btn-info btn-sm">🔍 Ver</a>
                                    <a href="?eliminar_usuario=<?= $u['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este usuario?')">🗑️ Eliminar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        


        <!-- Empresas -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                🏢 Empresas Registradas
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($e = $empresas->fetch_assoc()): ?>
                            <tr>
                                <td><?= $e['ID'] ?></td>
                                <td><?= $e['Nombre'] ?></td>
                                <td><?= $e['Correo'] ?></td>
                                <td>
                                    <a href="?eliminar_empresa=<?= $e['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta empresa?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Ofertas -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                💼 Ofertas Publicadas
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Empresa</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($o = $ofertas->fetch_assoc()): ?>
                            <tr>
                                <td><?= $o['ID'] ?></td>
                                <td><?= $o['Titulo'] ?></td>
                                <td><?= $o['Descripcion'] ?></td>
                                <td><?= $o['empresa_nombre'] ?></td>
                                <td>
                                    <a href="?eliminar_oferta=<?= $o['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta oferta?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <footer class="text-center">
        <p>🌴 Desarrollado en el corazón del Chocó - ProgreUIB © <?= date('Y') ?></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>