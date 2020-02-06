<?php

		require_once("../dompdf/dompdf_config.inc.php");
		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("producto",$conexion);


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="7" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>CODIGO</strong></td>
    <td><strong>DESCRIPCION</strong></td>
    <td><strong>CATEGORIA</strong></td>
    <td><strong>MARCA</strong></td>
    <td><strong>PRECIO</strong></td>
    <td><strong>STOCK</strong></td>
    <td><strong>SALDO</strong></td>
  </tr>';



$sql=mysql_query("select id_Producto, descripcion_Producto, Descripcion_Categoria, Descripcion_Marca, precio_Producto, stock_Producto from producto, categoria, marca where producto.id_Categoria=categoria.id_Categoria and producto.id_Marca=marca.id_Marca");
while($res=mysql_fetch_array($sql)){
  $saldo = ($res[4] * $res[5]);
$codigoHTML.='
	<tr>
		<td>'.$res[0].'</td>
		<td>'.$res[1].'</td>
		<td>'.$res[2].'</td>
		<td>'.$res[3].'</td>
		<td>'.$res[4].'</td>
		<td>'.$res[5].'</td>
    <td>'.$saldo.'</td>
	</tr>';

}
$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_Articulos.pdf");
?>
