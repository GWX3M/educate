<?php require_once('../Connections/conexion.php'); 

$email_user= $_POST['email'];



		mysql_select_db($database_conexion, $conexion);
		$query_RecuperarPaso1 = sprintf("SELECT * FROM z_users WHERE z_users.email = %s",
		
		GetSQLValueString($email_user,"text"));
		
		$RecuperarPaso1 = mysql_query($query_RecuperarPaso1, $conexion) or die(mysql_error());
		$row_RecuperarPaso1 = mysql_fetch_assoc($RecuperarPaso1);
		$totalRows_RecuperarPaso1 = mysql_num_rows($RecuperarPaso1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recuperar</title>
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript" src="../js/efectos.js"></script>
<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="principal">
  <div id="head">
    <div id="logo">
      <h1><a href="<?php echo $urlWeb ?>">eDucate</a> </h1>
      El mejor sitio para aprender y compartir...
    </div>
    <div id="add468"><img src="../img/add468.png" width="468" height="60" /></div>
  </div>
  <?php include("../inc/menu.php"); ?>
  <div id="leftt">
    <div id="section_info"><?php if ($totalRows_RecuperarPaso1!=""){ ?>
    Cuenta de usuario existente
	<?php } else echo "Esta cuenta no existe";?></div>
    
    <div id="section_l">
    <?php if ($totalRows_RecuperarPaso1!=""){ ?>
    Correcto te hemos enviado un correo de recuperación
   <?php  recuperar_password($email_user,$urlWeb,$nombreWeb);?>
   <?php } else echo "Esta cuenta no existe";?></div>
    
    
<?php     
function recuperar_password($email_user,$urlWeb,$nombreWeb)
{
	global $conexion, $database_conexion;
	
	$cdnrecuperacion = md5(rand());
	$updateSQL = sprintf("UPDATE z_users SET recuperar=%s WHERE email=%s",
                       GetSQLValueString($cdnrecuperacion, "text"),
                       GetSQLValueString($email_user, "text"));
	$Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
	
	$para = $email_user;
	$asunto = 'Recuperacion Password';
	$mensaje= "Para recuperar tu contraseña utiliza este enlace ".$urlWeb."user/recuperar_2.php?id=".$cdnrecuperacion;
	
	$cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\n";

	mail($para, $asunto, $mensaje, $cabeceras);
	
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