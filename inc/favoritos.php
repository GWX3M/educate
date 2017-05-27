<?php require_once('../Connections/conexion.php'); ?>
<?php 

$insertSQL = sprintf("INSERT INTO z_favori (usuario, post) VALUES (%s, %s)",

                       GetSQLValueString($_SESSION['MM_Id'], "int"),
					   GetSQLValueString($_GET['favoritos'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  
  
  header("Location:".$_SERVER['HTTP_REFERER']); 

?>
