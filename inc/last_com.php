<?php

$maxRows_LastComents = 7;
$pageNum_LastComents = 0;
if (isset($_GET['pageNum_LastComents'])) {
  $pageNum_LastComents = $_GET['pageNum_LastComents'];
}
$startRow_LastComents = $pageNum_LastComents * $maxRows_LastComents;

mysql_select_db($database_conexion, $conexion);
$query_LastComents = "SELECT * FROM z_coment ORDER BY z_coment.id DESC";
$query_limit_LastComents = sprintf("%s LIMIT %d, %d", $query_LastComents, $startRow_LastComents, $maxRows_LastComents);
$LastComents = mysql_query($query_limit_LastComents, $conexion) or die(mysql_error());
$row_LastComents = mysql_fetch_assoc($LastComents);

if (isset($_GET['totalRows_LastComents'])) {
  $totalRows_LastComents = $_GET['totalRows_LastComents'];
} else {
  $all_LastComents = mysql_query($query_LastComents);
  $totalRows_LastComents = mysql_num_rows($all_LastComents);
}
$totalPages_LastComents = ceil($totalRows_LastComents/$maxRows_LastComents)-1;
?>
<div id="sectio_r">
      <div id="side_r">ultimos comentarios</div>
      <?php do { ?>
        <span class="txt_side"><a href="<?php echo $urlWeb ?><?php echo UrlAmigablesInvertida($row_LastComents['post']) ?>.html">
	 <?php $titulolargo=saber_titulo($row_LastComents['post']);  if ((strlen($titulolargo))> 30) { $titulolargo=substr($titulolargo, 0, 30).".."; }
 echo $titulolargo?>
  </a></span><br />

        <?php } while ($row_LastComents = mysql_fetch_assoc($LastComents)); ?>
    </div>
<?php
mysql_free_result($LastComents);
?>