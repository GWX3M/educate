<?php require_once('../Connections/conexion.php'); 

 mysql_select_db($database_conexion, $conexion);
		$query_SacarIdMensaje = sprintf("SELECT * FROM z_users WHERE id=%s",$_GET['msn'],"int");
		$SacarIdMensaje = mysql_query($query_SacarIdMensaje, $conexion) or die(mysql_error());
		$row_SacarIdMensaje = mysql_fetch_assoc($SacarIdMensaje);
		$totalRows_SacarIdMensaje = mysql_num_rows($SacarIdMensaje);


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO z_mensajes (envia, recibe, asunto, mensaje) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_SESSION['MM_Id'], "int"),
                       GetSQLValueString($_GET['msn'], "int"),
					   GetSQLValueString($_POST['asunto'], "text"),
                       GetSQLValueString($_POST['mensaje'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  
  $emailderecibe=email($_GET['msn']);
  notificar_por_correo($emailderecibe,$urlWeb,$nombreWeb);

  $insertGoTo = $urlWeb."user/enviados.php";

  header(sprintf("Location: %s", $insertGoTo));
}
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
    <div id="section_info">Enviar mensaje privado a <?php  echo $row_SacarIdMensaje['nombre']; ?></div>
    <div id="section_l">
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right" valign="top">Asunto</td>
            <td><label for="asunto"></label>
            <input name="asunto" type="text" id="asunto" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right" valign="top">Mensaje:</td>
            <td><textarea name="mensaje" cols="50" rows="5"></textarea></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="Insertar registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form2" />
      </form>
      <p>&nbsp;</p>
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
<?php mysql_free_result($SacarIdMensaje);?>