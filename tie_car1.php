<!DOCTYPE html>

<!--

tie_car1.php

Agrega articulos al carrito de compras
Para crear la base y la tabla se requiere el script: php_tiendita_carrito.sql
El script se encuentra en el directorio: php_tiendita_carrito
Rogelio Ferreira Escutia - mayo 2018

-->

<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tiendita > Ver carrito de compras</title>
	</head>
	<body>
		<h2>Tiendita > Ver carrito de compras</h2>
		<?PHP
			$servidor="localhost";
			$usuario="root";
			$clave="";
			$conexion = mysqli_connect($servidor, $usuario, $clave, "php_tiendita_carrito");
			if (!$conexion)
				{ echo "<h2>Error al establecer conexión con el servidor!!!</h2>"; exit; }
		
			$sql = "SELECT * FROM carrito";
			$resultado=mysqli_query ($conexion, $sql);
			echo '<table>';
			while ($fila=mysqli_fetch_array($resultado))
				{
				echo '<tr>';
				echo '<td>'.$fila["nombre"].'</td>';
				echo '<td>'.$fila["articulo"].'</td>';
				echo '<td>'.$fila["cantidad"].'</td>';
				$ruta_imagenes="imagenes/".$fila["articulo"].".jpg";
				echo '<td><img src="'.$ruta_imagenes.'" /></td>';
				echo '<td><a href="tie_car2.php?nombre=ana&articulo='.$fila["articulo"].'"><img src="imagenes/papelera.png" /></a></td>';
				echo '<tr>';
				}
			echo '</table>';
			mysqli_close($conexion);
		?>
		<a href="index.html">Regresar a la pagina principal</a>
	</body>
</html>
