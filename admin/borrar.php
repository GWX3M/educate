<?php require_once('../Connections/conexion.php'); ?>
<?php 

$rangodeusuario=sacararango($_SESSION['MM_Id']);
if (!isset($_SESSION['MM_Id']) || ($rangodeusuario !=4)) {
	header("Location: ".$urlWeb );
}


		 $deleteSQL = sprintf("DELETE FROM z_posts WHERE id=%s",
							   GetSQLValueString($_GET['post'], "int"));
		
		  mysql_select_db($database_conexion, $conexion);
		  $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
		  
		  
		  $deleteSQL = sprintf("DELETE FROM z_coment WHERE post=%s",
							   GetSQLValueString($_GET['post'], "int"));
		
		  mysql_select_db($database_conexion, $conexion);
		  $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
		  
		  
		   header("Location:".$urlWeb); 

?>