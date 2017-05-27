<?php
 	
$maxRows_SacarListado = 6;
$pageNum_SacarListado = 0;
if (isset($_GET['pageNum_SacarListado'])) {
  $pageNum_SacarListado = $_GET['pageNum_SacarListado'];
}
$startRow_SacarListado = $pageNum_SacarListado * $maxRows_SacarListado;

mysql_select_db($database_conexion, $conexion);
$query_SacarListado = "SELECT * FROM z_posts ORDER BY id DESC";
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
<?php do { ?>
  <div id="section_l">
    <div id="tittle_h">
    <a href="<?php echo $row_SacarListado['urlamigable']; ?>.html"><?php echo $row_SacarListado['titulo']; ?></a>
     </div>
    <div id="post_info"><span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/date.png" width="14" height="14" /><?php echo tiempo_transcurrido($row_SacarListado['fecha']); ?></span>
      <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/author.png" width="14" height="14" /><a href="<?php echo $urlWeb ?>user/usuario.php?user=<?php echo $row_SacarListado['autor']; ?>"><?php echo nombre($row_SacarListado['autor']); ?></a></span>
      </div>
    </div>
  <?php } while ($row_SacarListado = mysql_fetch_assoc($SacarListado)); ?>
<?php mysql_free_result($SacarListado);?>