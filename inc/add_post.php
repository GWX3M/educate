
<?php require_once('../Connections/conexion.php'); ?>
<?php 

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$tiempocotejo= time();
  $insertSQL = sprintf("INSERT INTO z_posts (titulo, time, keywords, descripcion, contenido, autor, url) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
					   GetSQLValueString($tiempocotejo, "int"),
					   GetSQLValueString(genera_key($_POST['titulo']), "text"),
					   GetSQLValueString(strip_tags($_POST['contenido']), "text"),
					   GetSQLValueString($_POST['contenido'], "text"),
					   GetSQLValueString($_SESSION['MM_Id'], "int"),
					   GetSQLValueString($_POST['rUrl'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  
  
  		mysql_select_db($database_conexion, $conexion);
		$query_SacarIdPost = sprintf("SELECT id FROM z_posts WHERE time=%s",$tiempocotejo,"int");
		$SacarIdPost = mysql_query($query_SacarIdPost, $conexion) or die(mysql_error());
		$row_SacarIdPost = mysql_fetch_assoc($SacarIdPost);
		$totalRows_SacarIdPost = mysql_num_rows($SacarIdPost);
	
		mysql_free_result($SacarIdPost);
		
		
		$updateSQL = sprintf("UPDATE z_posts SET urlamigable= %s WHERE id=%s",
		               GetSQLValueString(limpia_espacios($_POST['titulo'],$row_SacarIdPost['id']), "text"),
                       GetSQLValueString($row_SacarIdPost['id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
		
		
  

  $insertGoTo = $urlWeb.UrlAmigablesInvertida($row_SacarIdPost['id']).".html";
  header(sprintf("Location: %s", $insertGoTo));
}
?>
