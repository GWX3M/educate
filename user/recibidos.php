<?php require_once('../Connections/conexion.php'); 

 mysql_select_db($database_conexion, $conexion);
		$query_SacarRecibidos = sprintf("SELECT * FROM z_mensajes WHERE recibe=%s ORDER BY id DESC",$_SESSION['MM_Id'],"int");
		$SacarRecibidos = mysql_query($query_SacarRecibidos, $conexion) or die(mysql_error());
		$row_SacarRecibidos = mysql_fetch_assoc($SacarRecibidos);
		$totalRows_SacarRecibidos = mysql_num_rows($SacarRecibidos);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recibidos</title>
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
    <div id="section_info">Mis mensajes recibidos <span style="float:right"><a href="enviados.php">Ver enviados</a></span></div>
 
 <?php if ($totalRows_SacarRecibidos ==0){ ?>
 <div id="section_l">
      No tienes ningun mensaje recibido!
    </div>
 
<?php  } else {?>


 <?php do { ?>
    <div id="section_l">
      <table width="611" border="0">
        <tr>
          <td width="103"><?php  echo nombre($row_SacarRecibidos['envia']); ?></td>
          <td width="498"><a href="msn_ver.php?mensaje=<?php echo $row_SacarRecibidos['id']; ?>"><?php  
		  if ($row_SacarRecibidos['asunto'] =="") echo "Sin asunto"; else echo $row_SacarRecibidos['asunto']; ?></a></td>
        </tr>
      </table>
    </div>
    <?php } while ($row_SacarRecibidos = mysql_fetch_assoc($SacarRecibidos)); ?>
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
<?php mysql_free_result($SacarRecibidos);?>