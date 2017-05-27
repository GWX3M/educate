<?php require_once('../Connections/conexion.php'); ?>
<?php 



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO z_coment (autor, comentario, post) VALUES (%s, %s, %s)",
                       GetSQLValueString($_SESSION['MM_Id'], "int"),
                       GetSQLValueString($_POST['comentario'], "text"),
					   GetSQLValueString($_POST['post'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
 
  $saberAutorporidpost= saber_autor_de_post($_POST['post']);
    if ($saberAutorporidpost != $_SESSION['MM_Id']){
  
  
  $insertSQL = sprintf("INSERT INTO z_notifica (post, comenta, autor) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['post'], "int"),
                       GetSQLValueString($_SESSION['MM_Id'], "int"),
					   GetSQLValueString($saberAutorporidpost, "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
}

 
  header("Location:".$_SERVER['HTTP_REFERER']); 
}
?>