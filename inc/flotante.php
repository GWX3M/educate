<div id="recoger_login" style="display:none;">
<div id="flotante" ><div id="section_login">
<div id="head_login"><a onclick="javascript:cerrar();" style="cursor:pointer;">Cerrar</a></div>
<form action="<?php echo $urlWeb ?>inc/arrancar.php" method="POST" name="formLogin"> 

<table width="198" border="0" align="center">
       <tr>
         <td width="192"><label for="nombre">Usuario o email</label><br />
           
           <input name="nombre" type="text" id="nombre" size="30" /></td>
       </tr>
       <tr>
         <td><label for="password">Password</label><br />
           
           <input name="password" type="text" id="password" size="30" />
           <br />
           <input type="checkbox" name="recordar" id="recordar" /> Recordarme</td>

       </tr>
       <tr>
         <td align="right"><input type="submit" name="button2" id="button2" value="Iniciar sesi&oacute;n" /></td>
       </tr>
   </table></form>
     
       </div></div><div id="fondo_negro"></div></div>