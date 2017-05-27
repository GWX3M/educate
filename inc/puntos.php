<?php require_once('../Connections/conexion.php'); ?>
<?php 


if (($_POST['score'] == 1) || ($_POST['score'] == -1)){
$insertSQL = sprintf("INSERT INTO z_puntos (usuario, post, puntos) VALUES (%s, %s, %s)",

					   GetSQLValueString($_SESSION['MM_Id'], "int"),
					    GetSQLValueString($_POST['id'], "int"),
					   GetSQLValueString($_POST['score'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  

$updateSQL = sprintf("UPDATE z_posts SET puntos= (puntos + %s) WHERE id=%s",
                       
					   GetSQLValueString($_POST['score'], "int"),
					   GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
}
  
  
  $iddelpost=$_POST['id'];
  
   mysql_select_db($database_conexion, $conexion);
		$query_SacarPostGet = sprintf("SELECT puntos FROM z_posts WHERE id=%s",$iddelpost,"int");
		$SacarPostGet = mysql_query($query_SacarPostGet, $conexion) or die(mysql_error());
		$row_SacarPostGet = mysql_fetch_assoc($SacarPostGet);
		$totalRows_SacarPostGet = mysql_num_rows($SacarPostGet);
		
		
		if ($row_SacarPostGet['puntos'] < -10){
			
			$deleteSQL = sprintf("DELETE FROM z_posts WHERE id=%s",
							   GetSQLValueString($iddelpost, "int"));
		
		  mysql_select_db($database_conexion, $conexion);
		  $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
			
}
		
		
		mysql_free_result($SacarPostGet);
		
  

?>
