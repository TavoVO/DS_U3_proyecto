<!DOCTYPE html>

<!--

tie_aca2.php

Agrega articulos al carrito de compras
Para crear la base y la tabla se requiere el script: php_tiendita_carrito.sql
El script se encuentra en el directorio: php_tiendita_carrito
Rogelio Ferreira Escutia - mayo 2018

-->

<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tiendita > Agregar articulos al carrito</title>
	</head>
	<body>
		<h2>Tiendita > Agregar articulos al carrito</h2>
		<?PHP
			extract($_REQUEST, EXTR_PREFIX_ALL|EXTR_REFS, 'recibir');
			$servidor="localhost";
			$usuario="root";
			$clave="";
			$conexion = mysqli_connect($servidor, $usuario, $clave, "php_tiendita_carrito");
			if (!$conexion)
				{ echo "<h2>Error al establecer conexión con el servidor!!!</h2>"; exit; }
		
			$sql = "INSERT INTO carrito VALUES ('$recibir_nombre', '$recibir_articulo', 1)";
			mysqli_query ($conexion, $sql);
			$sql = "SELECT * FROM catalogo WHERE articulo='$recibir_articulo'";
			$resultado=mysqli_query ($conexion, $sql);
			while ($fila=mysqli_fetch_array($resultado))
				{
				$cantidad_nueva= $fila["cantidad"]-1;
				$sql = "UPDATE catalogo SET cantidad=$cantidad_nueva where articulo='$recibir_articulo'";
				mysqli_query ($conexion, $sql);
				}
			echo "<br />Articulo agregado al carrito!!!<br /><br />";
			mysqli_close($conexion);
		?>
		<a href="index.html">Regresar a la pagina principal</a>
	</body>
</html>
