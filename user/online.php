<?php require_once('../Connections/conexion.php'); 

  mysql_select_db($database_conexion, $conexion);
		$query_SacarEnviados = "SELECT * FROM z_online";
		$SacarEnviados = mysql_query($query_SacarEnviados, $conexion) or die(mysql_error());
		$row_SacarEnviados = mysql_fetch_assoc($SacarEnviados);
		$totalRows_SacarEnviados = mysql_num_rows($SacarEnviados);

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
    <div id="section_info">Usuarios online</div>
 
<?php  if ($totalRows_SacarEnviados!=0) {?>
 <?php do { ?>
    <div id="section_l">
    <?php echo nombre($row_SacarEnviados['usuarioOnline'])?>
    </div>
    <?php } while ($row_SacarEnviados = mysql_fetch_assoc($SacarEnviados)); ?>
    <?php }?>
    
    
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
<?php mysql_free_result($SacarEnviados);?>