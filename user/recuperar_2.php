<?php require_once('../Connections/conexion.php'); 

$identifacador= $_GET['id'];

		$cadenacaracteres= md5(rand());
		$cadenalimpia= rand();
		
		
		$updateSQL = sprintf("UPDATE z_users SET password = %s, recuperar='' WHERE recuperar=%s",
							  
							   GetSQLValueString($cadenacaracteres, "text"),
							   GetSQLValueString($identifacador, "text"));
		
		  mysql_select_db($database_conexion, $conexion);
		  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pagina web php, ajax y jquery</title>
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript" src="../js/efectos.js"></script>
<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="principal">
  <div id="head">
    <div id="logo">
      <h1><a href="<?php echo $urlWeb ?>">cursoweb</a> </h1>
      Tutorial pagina web con php,ajax y jquery
    </div>
    <div id="add468"><img src="../img/add468.png" width="468" height="60" /></div>
  </div>
  <?php include("../inc/menu.php"); ?>
  <div id="leftt">
    <div id="section_info">Tu nuevo password</div>
    
    <div id="section_l">
    
    Tu nueva contraseña es <?php echo $cadenalimpia ?>
    
    </div>
    
    
<?php     
function recuperar_password($email_user,$urlWeb,$nombreWeb)
{
	global $conexion, $database_conexion;
	
	$cdnrecuperacion = md5(rand());
	$updateSQL = sprintf("UPDATE z_users SET recuperar=%s WHERE email=%s",
                       GetSQLValueString($cdnrecuperacion, "text"),
                       GetSQLValueString($email_user, "text"));
	$Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
	
	/*$para = $email;
	$asunto = 'Recuperacion Password';
	$mensaje.='Para recuperar tu password utiliza este link:<br>
	<a href="http://elbauldezeus.net16.net/user/recuperar_3.php?email='.$email.'&id='.$cdnrecuperacion.'">http://elbauldezeus.net16.net/user/recuperar_3.php?email='.$email.'&id='.$cdnrecuperacion.'</a>';
	
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

	$cabeceras .= 'From: nocontestar@datoweb.com' . "\n";
	
	$para=$email;
	mail($para, $asunto, $mensaje, $cabeceras);*/
	
}?>
    
    
    
  </div>
  <div id="rigthh">
    <?php include("../inc/buscador.php"); ?>
    <?php include("../inc/stats.php"); ?>
    <?php include("../inc/last_com.php"); ?>
    <?php include("../inc/tags.php"); ?>
  </div>
</div><div id="footer"><div id="txt_fo"><a href="#">Pagina1</a> <a href="#">Pagina2</a> <a href="#">Pagina3</a> <a href="#">Pagina4</a></div>
<div class="item_top"><a href="" id="arriba">Subir arriba</a></div>
</div>
<?php include("../inc/flotante.php"); ?>
</body>
</html>
<?php mysql_free_result($RecuperarPaso1);?>