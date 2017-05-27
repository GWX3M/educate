<?php require_once('../Connections/conexion.php'); 

$iddeluser= $_SESSION['MM_Id'];

 mysql_select_db($database_conexion, $conexion);
		$query_SacarMiPerfil = sprintf("SELECT * FROM z_users WHERE id=%s",$iddeluser,"int");
		$SacarMiPerfil = mysql_query($query_SacarMiPerfil, $conexion) or die(mysql_error());
		$row_SacarMiPerfil = mysql_fetch_assoc($SacarMiPerfil);
		$totalRows_SacarMiPerfil = mysql_num_rows($SacarMiPerfil);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Perfil</title>
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
    <div id="section_info">Mi perfil</div>
    <div id="section_l">
      <table width="583" height="153" border="0" align="center">
        <tr>
          <td width="125" height="147" valign="top"><img src="avatar/<?php echo $row_SacarMiPerfil['avatar']; ?>" width="100" height="100" /><?php echo $row_SacarMiPerfil['nombre']; ?></td>
          <td width="442" valign="top"><table width="439" height="124" border="0">
            <tr>
              <td width="429">Rango: <?php echo rango($row_SacarMiPerfil['rango']); ?></td>
            </tr>
            <?php if ($row_SacarMiPerfil['lema'] !=""){?>
            <tr>
              <td>Lema: <?php echo $row_SacarMiPerfil['lema']; ?></td>
            </tr>
            <?php }?>
            <tr>
              <td>Puntos: <?php echo $row_SacarMiPerfil['puntos']; ?></td>
            </tr>
            <tr>
              <td>Ultima conexi&oacute;n: <?php echo tiempo_transcurrido($row_SacarMiPerfil['ultima']); ?></td>
            </tr>
          </table>
          <span style="float:right"><a href="editar.php">Editar perfil</a></span></td>
        </tr>
      </table>

   
    </div>
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
<?php mysql_free_result($SacarMiPerfil);?>