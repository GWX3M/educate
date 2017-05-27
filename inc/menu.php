<div id="menu">
    <div id="item_me"><a href="<?php echo $urlWeb ?>index.php">Inicio</a></div>
    <div id="item_me"><a href="<?php echo $urlWeb ?>contacto.php">Contacto</a></div>
    <div id="item_me"><a href="<?php echo $urlWeb ?>tops.php">Top5</a></div>


    
  <?php   if (isset ($_SESSION['MM_Id'])){ ?>
	 <div id="item_me"><a href="<?php echo $urlWeb ?>agregar.php">Crear CURSO</a></div>
    <?php }?>
    
    
    
    <?php if (isset ($_SESSION['MM_Id'])){ ?>
  <div id="item_op"><a href="<?php echo $logoutAction ?>"> <img src="<?php echo $urlWeb ?>img/out.png" width="16" height="16" /></a></div>
     <div id="item_op" style="margin-top:1px"><a href="<?php echo $urlWeb ?>user/perfil.php"><?php echo nombre($_SESSION['MM_Id']) ?></a>
  </div>
    <div id="item_op"><a href="<?php echo $urlWeb ?>user/favoritos.php"><img src="<?php echo $urlWeb ?>img/fav.png" width="16" height="16" /></a></div>
   <div id="item_op">
   
 <?php if  (MensajesPendientes($_SESSION['MM_Id'])){ ?>
   <div id="notifica_msn"><?php echo saber_cuantos_estan_sin_leer($_SESSION['MM_Id']) ?></div>
   <?php }?>
   
   <a href="<?php echo $urlWeb ?>user/recibidos.php"><img  src="<?php echo $urlWeb ?>img/msn.png" width="16" height="16" /></a></div>
    <div id="item_op">
    
     <?php if  (NotificacionesPendientes($_SESSION['MM_Id'])){ ?>
    <div id="notifica_msn">?</div>
    <?php }?>
    
    <a href="<?php echo $urlWeb ?>user/notificaciones.php"><img src="<?php echo $urlWeb ?>img/notifica.png" width="16" height="16" /></a></div>
    <?php }
	else {?>
 <div id="item_op"><a href="<?php echo $urlWeb ?>user/registro.php">Registro</a></div>
    <div id="item_op"><a  onclick="javascript:ver();" style="cursor:pointer">Loguearse</a></div>
    <?php }?>
    
  </div>