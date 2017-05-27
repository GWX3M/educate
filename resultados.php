<?php require_once('Connections/conexion.php'); ?>
<?php

$maxRows_SacarListado = 6;
$pageNum_SacarListado = 0;
if (isset($_GET['pageNum_SacarListado'])) {
  $pageNum_SacarListado = $_GET['pageNum_SacarListado'];
}
$startRow_SacarListado = $pageNum_SacarListado * $maxRows_SacarListado;

$colname_SacarListado = "-1";
if (isset($_GET['buscar'])) {
  $colname_SacarListado = $_GET['buscar'];
}
mysql_select_db($database_conexion, $conexion);
$query_SacarListado = sprintf("SELECT * FROM z_posts WHERE titulo LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_SacarListado . "%", "text"));
$query_limit_SacarListado = sprintf("%s LIMIT %d, %d", $query_SacarListado, $startRow_SacarListado, $maxRows_SacarListado);
$SacarListado = mysql_query($query_limit_SacarListado, $conexion) or die(mysql_error());
$row_SacarListado = mysql_fetch_assoc($SacarListado);

if (isset($_GET['totalRows_SacarListado'])) {
  $totalRows_SacarListado = $_GET['totalRows_SacarListado'];
} else {
  $all_SacarListado = mysql_query($query_SacarListado);
  $totalRows_SacarListado = mysql_num_rows($all_SacarListado);
}
$totalPages_SacarListado = ceil($totalRows_SacarListado/$maxRows_SacarListado)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resultado de Busqueda</title>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<script type="text/javascript" src="js/efectos.js"></script>
<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
<div id="principal">
  <div id="head">
    <div id="logo">
      <h1><a href="<?php echo $urlWeb ?>">eDucate</a> </h1>
      El mejor sitio para aprender y compartir...
    </div>
    <div id="add468"><img src="img/educatelogo.jpg" width="468" height="60" /></div>
  </div>
  <?php include("inc/menu.php"); ?>
  <div id="leftt">
    <div id="section_info">Resultados de busqueda <?php echo $totalRows_SacarListado ?></div>
    <?php do { ?>
      <div id="section_l">
        <div id="tittle_h"><a href="ver_post.php?date=<?php echo $row_SacarListado['id']; ?>"><?php echo $row_SacarListado['titulo']; ?></a></div>
        <div id="post_info"><span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/date.png" width="14" height="14" />27 May, 2017</span>
        </div>
      </div>
      <?php } while ($row_SacarListado = mysql_fetch_assoc($SacarListado)); ?>
  </div>
  <div id="rigthh">
    <?php include("inc/buscador.php"); ?>
    <?php include("inc/stats.php"); ?>
    <?php include("inc/last_com.php"); ?>
    <?php include("inc/tags.php"); ?>
  </div>
</div><div id="footer"><div id="txt_fo"><a href="#">Pagina1</a> <a href="#">Pagina2</a> <a href="#">Pagina3</a> <a href="#">Pagina4</a></div>
<div class="item_top"><a href="" id="arriba" >Subir arriba</a></div>
</div>
<?php include("inc/flotante.php"); ?>
</body>
</html>
<?php
mysql_free_result($SacarListado);
?>
