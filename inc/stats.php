<?php

mysql_select_db($database_conexion, $conexion);
$query_EstadisticasWeb = "SELECT * FROM z_users";
$EstadisticasWeb = mysql_query($query_EstadisticasWeb, $conexion) or die(mysql_error());
$row_EstadisticasWeb = mysql_fetch_assoc($EstadisticasWeb);
$totalRows_EstadisticasWeb = mysql_num_rows($EstadisticasWeb);

mysql_select_db($database_conexion, $conexion);
$query_EstadisticasPost = "SELECT * FROM z_posts";
$EstadisticasPost = mysql_query($query_EstadisticasPost, $conexion) or die(mysql_error());
$row_EstadisticasPost = mysql_fetch_assoc($EstadisticasPost);
$totalRows_EstadisticasPost = mysql_num_rows($EstadisticasPost);

mysql_select_db($database_conexion, $conexion);
$query_Estadisticason = "SELECT * FROM z_online";
$Estadisticason = mysql_query($query_Estadisticason, $conexion) or die(mysql_error());
$row_Estadisticason = mysql_fetch_assoc($Estadisticason);
$totalRows_Estadisticason = mysql_num_rows($Estadisticason);

mysql_select_db($database_conexion, $conexion);
$query_EstadisticasCom = "SELECT * FROM z_coment";
$EstadisticasCom = mysql_query($query_EstadisticasCom, $conexion) or die(mysql_error());
$row_EstadisticasCom = mysql_fetch_assoc($EstadisticasCom);
$totalRows_EstadisticasCom = mysql_num_rows($EstadisticasCom);
?>


<div id="sectio_r">
      <div id="side_r">estadisticas</div>
    <span class="txt_side"><a href="<?php echo $urlWeb ?>user/online.php"><?php echo $totalRows_Estadisticason ?> usuarios en linea</a></span><br />
     <span class="txt_side"><a href="<?php echo $urlWeb ?>user/miembros.php"><?php echo $totalRows_EstadisticasWeb ?> miembros registrados</a></span><br />
     <span class="txt_side"><?php echo $totalRows_EstadisticasPost ?> cursos creados</span><br />
     <span class="txt_side"><?php echo $totalRows_EstadisticasCom ?> comentarios en los cursos</span></div>
<?php
mysql_free_result($EstadisticasWeb);
mysql_free_result($EstadisticasPost);
mysql_free_result($Estadisticason);
mysql_free_result($EstadisticasCom);
?>
