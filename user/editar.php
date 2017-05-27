<?php require_once('../Connections/conexion.php'); ?>

<?php
$varId_EditarMisDatos = "0";
if (isset($_SESSION['MM_Id'])) {
  $varId_EditarMisDatos = $_SESSION['MM_Id'];
}
mysql_select_db($database_conexion, $conexion);
$query_EditarMisDatos = sprintf("SELECT * FROM z_users WHERE z_users.id = %s", GetSQLValueString($varId_EditarMisDatos, "int"));
$EditarMisDatos = mysql_query($query_EditarMisDatos, $conexion) or die(mysql_error());
$row_EditarMisDatos = mysql_fetch_assoc($EditarMisDatos);
$totalRows_EditarMisDatos = mysql_num_rows($EditarMisDatos);
?>

<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
?>
<?php
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE z_users SET avatar=%s, lema=%s WHERE id=%s",
                       GetSQLValueString($_POST['avatar'], "text"),
                       GetSQLValueString($_POST['lema'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "perfil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Editar</title>
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
<script type="text/javascript">
function subirimagen()
{
	self.name = 'opener';
	remote = open('subir_avatar.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
}
</script>

      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
        <table align="center">
          <tr valign="baseline">
            <td><img src="avatar/<?php echo $row_EditarMisDatos['avatar']; ?>" width="100" height="100" />
            <input type="hidden" name="avatar" value="<?php echo $row_EditarMisDatos['avatar']; ?>" size="32" />
            <input type="button" name="button" id="button" value="Cambiar" onclick="javascript:subirimagen();" /></td>
          </tr>
          <tr valign="baseline">
            <td><textarea name="lema" cols="50" rows="5"><?php echo htmlentities($row_EditarMisDatos['lema'], ENT_COMPAT, 'iso-8859-1'); ?></textarea></td>
          </tr>
          <tr valign="baseline">
            <td><input type="submit" value="Actualizar" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form2" />
        <input type="hidden" name="id" value="<?php echo $row_EditarMisDatos['id']; ?>" />
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
<?php
mysql_free_result($EditarMisDatos);
?>