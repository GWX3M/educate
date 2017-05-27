<?php require_once('../Connections/conexion.php'); 

 mysql_select_db($database_conexion, $conexion);
		$query_SacarEnviados = sprintf("SELECT * FROM z_mensajes WHERE envia=%s ORDER BY id DESC",$_SESSION['MM_Id'],"int");
		$SacarEnviados = mysql_query($query_SacarEnviados, $conexion) or die(mysql_error());
		$row_SacarEnviados = mysql_fetch_assoc($SacarEnviados);
		$totalRows_SacarEnviados = mysql_num_rows($SacarEnviados);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eDucate</title>
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
    <div id="section_info">Mis mensajes enviados <span style="float:right"><a href="recibidos.php">Ver recibidos</a></span></div>
 
 
 <?php do { ?>
    <div id="section_l">
      <table width="611" border="0">
        <tr>
          <td width="103"><?php  echo nombre($row_SacarEnviados['recibe']); ?></td>
          <td width="498"><a href="msn_ver.php?mensaje=<?php echo $row_SacarEnviados['id']; ?>"><?php  
		  if ($row_SacarEnviados['asunto'] =="") echo "Sin asunto"; else echo $row_SacarEnviados['asunto']; ?></a></td>
        </tr>
      </table>
    </div>
    <?php } while ($row_SacarEnviados = mysql_fetch_assoc($SacarEnviados)); ?>
    
    
    
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