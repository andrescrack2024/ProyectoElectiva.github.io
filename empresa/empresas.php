<?php
session_start();
include("../conex.php");

if (!isset($_SESSION['Rol']) || $_SESSION['Rol'] !== 'Empresa') {
    header("Location: ../login.php?mensaje=Acceso no autorizado&clase=alert-danger");
    exit;
}

$correoEmpresa = $_SESSION['Correo'] ?? '';
$nombreEmpresa = $_SESSION['Nombre'] ?? 'Empresa';

// Manejo de eliminación
if (isset($_GET['eliminar'])) {
    $idOferta = $_GET['eliminar'];
    $stmt = $conexion->prepare("DELETE FROM ofertas WHERE id = ? AND Empresa_id = ?");
    $stmt->bind_param("ii", $idOferta, $_SESSION['ID']);
    $stmt->execute();
    header("Location: empresas.php");
    exit;
}

// Obtener ofertas creadas por esta empresa
$stmt = $conexion->prepare("SELECT * FROM ofertas WHERE Empresa_id = ?");
$stmt->bind_param("s", $correoEmpresa);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Empresa - ProgreUIB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ProgreUIB</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../logout.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <h3>Bienvenida, <?php echo htmlspecialchars($nombreEmpresa); ?> 👩‍💼</h3>

        <!-- Formulario para publicar oferta -->
        <div class="card mt-4">
            <div class="card-header">Publicar Nueva Oferta</div>
            <div class="card-body">
                <form action="publicar_oferta.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Título del Empleo</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Área</label>
                        <select name="area" class="form-select" required>
                            <option value="Programador">Programador</option>
                            <option value="Docente">Docente</option>
                            <option value="Analista de Datos">Analista de Datos</option>
                            <option value="Diseñador Gráfico">Diseñador Gráfico</option>
                            <!-- Agrega más áreas si lo deseas -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Publicar</button>
                </form>
            </div>
        </div>

        <!-- Ofertas publicadas -->
        <div class="mt-5">
            <h4>Mis Ofertas Publicadas</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Área</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($oferta = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($oferta['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($oferta['descripcion']); ?></td>
                            <td><?php echo htmlspecialchars($oferta['area']); ?></td>
                            <td>
                                <a href="editar_oferta.php?id=<?php echo $oferta['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="?eliminar=<?php echo $oferta['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta oferta?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>