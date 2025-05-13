<?php
session_start();
include '../conex.php';

// Validación de sesión
if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'Empresa') {
    echo "Acceso no autorizado.";
    exit();
}

$empresa_id = $_SESSION['ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $area = $_POST['area'];

    // Fecha actual automática
    $fecha_publicacion = date("Y-m-d");

    // Insertar en la tabla ofertas
    $sql = "INSERT INTO ofertas (Titulo, Descripcion, Area, Empresa_id, Fecha_Publicacion) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssds", $titulo, $descripcion, $area, $empresa_id, $fecha_publicacion);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Oferta publicada con éxito');
                window.location.href = 'empresas.php';
              </script>";
    } else {
        echo "❌ Error al publicar la oferta: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Formulario no válido.";
}
?>
