<?php
session_start();
if (isset($_SESSION['user'])) {
    // Si el usuario está logueado, continuar con el código
} else {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Artículos | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <style>
        .article-item {
            margin-bottom: 30px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .article-item img {
            max-width: 100%;
            height: auto;
        }
        .article-item .data {
            padding: 10px;
        }
        .article-item .data h2 {
            font-size: 24px;
            color: #333;
        }
        .article-item .data p {
            font-size: 16px;
            color: #666;
        }
        .article-item .date {
            font-size: 14px;
            color: #888;
            margin-top: 10px;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen Proyecto" title="PHP Proyecto">
            
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
            <li><a href="mostrar_categorias.php">Categorias</a></li>
            <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1 class="title">Listado de Artículos</h1>
            <hr>
            <?php
            include_once('conexion.php');

            // Consulta SQL
            $sql = "SELECT 
                        articulos.id, 
                        articulos.descripcion AS articulo, 
                        articulos.pu, 
                        articulos.cantidad, 
                        categorias.descripcion AS categoria,
                        articulos.img,
                        articulos.creado_el
                    FROM articulos 
                    INNER JOIN categorias 
                    ON articulos.id_categoria = categorias.id";

            $ejecucion_sql = $conexion->query($sql);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<article class="article-item">';
                    
                    // Mostrar imagen si existe
                    if (!empty($fila['img'])) {
                        echo '<div><img src="' . htmlspecialchars($fila['img']) . '" alt="' . htmlspecialchars($fila['articulo']) . '" /></div>';
                    }
                    
                    echo '<div class="data">
                            <h2>' . htmlspecialchars($fila['articulo']) . '</h2>
                            <p>Descripción: ' . htmlspecialchars($fila['articulo']) . '</p>
                            <p>Categorías: ' . htmlspecialchars($fila['categoria']) . '</p>
                            <span class="date">
                                Creado el: ' . htmlspecialchars($fila['creado_el']) . '
                            </span>
                          </div>';
                    echo '<div class="clearfix"></div>';
                    echo '</article>';
                }
            } else {
                echo '<p>No hay artículos disponibles.</p>';
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
