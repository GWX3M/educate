<?php require_once('Connections/conexion.php'); ?>
<?php

$maxRows_SacarComent = 10;
$pageNum_SacarComent = 0;
if (isset($_GET['pageNum_SacarComent'])) {
  $pageNum_SacarComent = $_GET['pageNum_SacarComent'];
}
$startRow_SacarComent = $pageNum_SacarComent * $maxRows_SacarComent;

mysql_select_db($database_conexion, $conexion);
$query_SacarComent = sprintf("SELECT * FROM z_coment WHERE post=%s ORDER BY id DESC",$row_SacarPostGet['id'],"int");
$query_limit_SacarComent = sprintf("%s LIMIT %d, %d", $query_SacarComent, $startRow_SacarComent, $maxRows_SacarComent);
$SacarComent = mysql_query($query_limit_SacarComent, $conexion) or die(mysql_error());
$row_SacarComent = mysql_fetch_assoc($SacarComent);

if (isset($_GET['totalRows_SacarComent'])) {
  $totalRows_SacarComent = $_GET['totalRows_SacarComent'];
} else {
  $all_SacarComent = mysql_query($query_SacarComent);
  $totalRows_SacarComent = mysql_num_rows($all_SacarComent);
}
$totalPages_SacarComent = ceil($totalRows_SacarComent/$maxRows_SacarComent)-1;
?>

<?php if ($row_SacarComent !=""){?>

<?php do { ?>
  <div id="section_l"><?php echo nombre($row_SacarComent['autor']); ?> comento:<br />
  <?php echo $row_SacarComent['comentario']; ?></div>
  <?php } while ($row_SacarComent = mysql_fetch_assoc($SacarComent)); ?>
  <?php } else {?>
  <div id="section_l">No hay comentarios!</div>
  <?php }?>
<?php
mysql_free_result($SacarComent);
?>
