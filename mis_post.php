<?php require_once('Connections/conexion.php'); ?>
<?php
$iddelpost= $_GET['date'];


$updateSQL = sprintf("UPDATE z_posts SET visitas= visitas +1 WHERE id=%s",
                       GetSQLValueString($iddelpost, "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());



 mysql_select_db($database_conexion, $conexion);
		$query_SacarPostGet = sprintf("SELECT * FROM z_posts WHERE id=%s",$iddelpost,"int");
		$SacarPostGet = mysql_query($query_SacarPostGet, $conexion) or die(mysql_error());
		$row_SacarPostGet = mysql_fetch_assoc($SacarPostGet);
		$totalRows_SacarPostGet = mysql_num_rows($SacarPostGet);
		
		
		
		$updateSQL = sprintf("UPDATE z_notifica SET estado= 1 WHERE post=%s AND autor=%s",
                       GetSQLValueString($iddelpost, "int"),
					   GetSQLValueString($_SESSION['MM_Id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  
  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mis Posts</title>
<meta name="description" content="<?php echo $row_SacarPostGet['descripcion'] ?>" />
<meta name="keywords" content="<?php echo $row_SacarPostGet['keywords'] ?>" />
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
      <h1><a href="<../>">eDucate</a> </h1>
      El mejor sitio para aprender y compartir...
    </div>
    <div id="add468"><img src="img/educatelogo.jpg" width="468" height="60" /></div>
  </div>
  <?php include("inc/menu.php"); ?>
  <div id="leftt">
   <div id="section_l">
      <div id="tittle_h" style="border-bottom:1px dashed #ccc"><?php echo $row_SacarPostGet['titulo']; ?></div>
      <div id="container"><?php echo $row_SacarPostGet['contenido']; ?></div>
<div id="post_info"><span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/date.png" width="14" height="14" />23 Dec, 2011</span>
  <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/category.png" width="14" height="14" /><a href="page/categoria.php">Categoria</a></span>
  <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/author.png" width="14" height="14" /><a href="user/usuario.php?user=<?php echo $row_SacarPostGet['autor']; ?>"><?php echo nombre($row_SacarPostGet['autor']); ?></a></span>
  <span class="in_txt"><img class="h_img" src="<?php echo $urlWeb ?>img/permalink.png" width="14" height="14" /><a href="ver_post.php">Enlace</a></span>
  <span class="in_txt">Visitas <?php echo $row_SacarPostGet['visitas']; ?></span>
</div>

<div id="usuario_op">

<?php  if (ya_en_favoritos($_SESSION['MM_Id'],$iddelpost)){?>
<a href="inc/favoritos.php?favoritos=<?php echo $row_SacarPostGet['id'] ?>">A favoritos</a>
<?php } else echo "Ya favorito";?>
<a href="admin/borrar.php?post=<?php echo $row_SacarPostGet['id'] ?>"> Borrar</a>

</div>
   </div>
    
    <?php include("inc/comentarios.php"); ?>
   
   
  <?php  if (isset($_SESSION['MM_Id'])){?>
    <div id="section_l">
      <form id="form2" name="form2" method="POST" action="<?php echo $urlWeb; ?>inc/nuevo_com.php">
        <p>
        <p>
          <label for="comentario"></label>
          <textarea name="comentario" id="comentario" cols="45" required="required" maxlength="250" rows="5"></textarea>
        </p>
        <p>
        <input type="hidden" name="post" value="<?php echo $row_SacarPostGet['id'] ?>" />
          <input type="submit" name="button" id="button" value="Comentar" />
        </p>
        <input type="hidden" name="MM_insert" value="form2" />
      </form>
    </div>
    <?php } else {?>
    <div id="section_l">Para comentar <a href="<?php echo $urlWeb ?>user/registro.php">registrate!</a></div>
    <?php }?>
    
  </div>
 
  <div id="rigthh">
    <?php include("inc/buscador.php"); ?>
    <?php include("inc/stats.php"); ?>
    <?php include("inc/last_com.php"); ?>
    <?php include("inc/tags.php"); ?>
  </div>
</div><div id="footer"><div id="txt_fo"><a href="#">Pagina1</a> <a href="#">Pagina2</a> <a href="#">Pagina3</a> <a href="#">Pagina4</a></div>
<div class="item_top"><a href="" id="arriba">Subir arriba</a></div>
</div>
<?php include("inc/flotante.php"); ?>
</body>
</html>
<?php mysql_free_result($SacarPostGet);?>