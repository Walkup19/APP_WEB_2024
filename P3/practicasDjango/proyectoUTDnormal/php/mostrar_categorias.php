<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Logotipo PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="acercade.php">Acerca de</a></li>
           
            <li><a href="mostrar_articulos.php">Artículos</a></li>
            <li><a href="mostrar_categorias.php">Categorías</a></li>
            <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1 class="title">Categorías</h1>
            <hr>
            <h1 align="center">Listado</h1>
            <hr>
            <?php
            include_once('conexion.php');

            // Consulta SQL
            $sql = "SELECT titulo AS name, descripcion AS description, fecha AS created_at FROM categorias;";
            $ejecucion_sql = $conexion->query($sql);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<article class="article-item">
                            <div class="data">
                                <h2>' . htmlspecialchars($fila['name']) . '</h2>
                                <p>Descripción: ' . htmlspecialchars($fila['description']) . '</p>
                                <span class="date">' . htmlspecialchars($fila['created_at']) . '</span>
                                <hr>
                            </div>
                            <div class="clearfix"></div>
                          </article>';
                }
            } else {
                echo '<p>No hay categorías disponibles.</p>';
            }
            ?>
        </div>
    </section>
    <?php
    date_default_timezone_set('America/Monterrey');
    $fechaHoraActual = date('d/m/Y H:i:s');
    ?>
    <footer>
    <p>Curso PHP con Walkup &copy; 2024 | Visitado el: <?php echo $fechaHoraActual; ?></p>
    </footer>
</body>
</html>
