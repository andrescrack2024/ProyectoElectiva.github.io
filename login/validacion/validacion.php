<?php
session_start();
include("../../conex.php");

$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['contraseña'] ?? '';

$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE Correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($usuario = $resultado->fetch_assoc()) {
    if (password_verify($contrasena, $usuario['Contraseña'])) {
        $_SESSION['Nombre'] = $usuario['Nombre'];
        $_SESSION['Rol'] = $usuario['Rol'];
        $_SESSION['Area'] = $usuario['Area'];
        $_SESSION['ID'] = $usuario['ID'];

        $rol = $usuario['Rol'];
        $area = $usuario['Area'];

        // Redirección según el ROL
        if ($rol === 'Administrador') {
            $destino = '../../admin/admin.php';
        } elseif ($rol === 'Empresa') {
            $destino = '../../empresa/empresas.php';
        } elseif ($rol === 'Vendedor') {
            $destino = '../vendedor/index.php';
        } elseif ($rol === 'Trabajador') {
            // Redirección según el AREA para Trabajadores
            switch ($area) {
                case 'Programador':
                    $destino = '../../trabajador/programador.php';
                    break;
                case 'Docente':
                    $destino = '../../trabajador/docente.php';
                    break;
                case 'Analista de Datos':
                    $destino = '../../trabajador/analista.php';
                    break;
                case 'Diseñador Gráfico':
                    $destino = '../../trabajador/disenador.php';
                    break;
                // Agregá más áreas aquí
                default:
                    $destino = '../trabajador/index.php';
                    break;
            }
        } else {
            $destino = '../login.php';
        }

        echo "<div class='container mt-4'>
        <div class='alert alert-success'>
            Bienvenido, redirigiendo a tu espacio... <br> Serás redirigido en 3 segundos...
        </div>
      </div>
      <script>
        setTimeout(function() {
            window.location.href = '$destino';
        }, 3000);
      </script>";

    } else {
        $msg = urlencode("Contraseña incorrecta");
        header("Location: ../login.php?mensaje=$msg&clase=alert-danger&correo=" . urlencode($correo));
    }
} else {
    header("Location: ../login.php?mensaje=" . urlencode("Correo no registrado") . "&clase=alert-danger");
}
