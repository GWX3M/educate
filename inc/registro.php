<?php require_once('../Connections/conexion.php'); ?>
<?php 
if  ($_POST['suma'] != 5){
	 header("Location:".$_SERVER['HTTP_REFERER']); 

}
else {

  $insertSQL = sprintf("INSERT INTO z_users (nombre, email, password, rango) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
					   GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString(md5($_POST['password']), "text"),
					   GetSQLValueString(1, "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  
  
  
  $para= $emailAdmin;
		$titulo = 'Nuevo usuario en '.$nombreWeb;
		$mensaje = $_POST['nombre'].' se acaba de registrar en '.$urlWeb ;
		$cabeceras = 'From: no_contestar@datoweb.com' . "\r\n" .
			'Reply-To: no_contestar@datoweb.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		
		mail($para, $titulo, $mensaje, $cabeceras);
  
  

  $insertGoTo = $urlWeb."user/login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
