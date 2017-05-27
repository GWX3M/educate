<?php require_once('../Connections/conexion.php');
if (isset ($_SESSION['MM_Id'])){
	header("Location: " . $urlWeb );

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
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
   <div id="section_l">
    <form action="<?php echo $urlWeb ?>inc/arrancar.php" method="POST" name="formLogin"> <table width="311" border="0" align="center">
       <tr>
         <td width="79" align="right">Usuario</td>
         <td width="192"><label for="nombre"></label>
           <input name="nombre" type="text" id="nombre" size="30" /></td>
       </tr>
       <tr>
         <td align="right">Password</td>
         <td><label for="password"></label>
           <input name="password" type="text" id="password" size="30" /></td>
       </tr>
       <tr>
         <td align="right"><input type="checkbox" name="recordar" id="recordar" />
           <label for="recordar"></label></td>
         <td align="right"><span style="float:left; margin-top:5px">Recordarme</span>
           <input type="submit" name="button2" id="button2" value="Iniciar sesi&oacute;n" /></td>
       </tr>
     </table></form>
      
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