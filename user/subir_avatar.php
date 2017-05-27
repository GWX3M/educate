<?php 
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Subir Imagen</title>
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
<style type="text/css">
body  {
	background-color:#f5f5f5;
}
</style>
</head> 
<body >
<?php if ((isset($_POST["enviado"]) == "form2")) {
	
	if (($_FILES['userfile']['size']>102400) || ($_FILES['userfile']['type'] != "image/jpeg"))
		echo "Esta imagen no es valida, prueba con otra";
		else
		{
	$nombre_archivo = $_FILES['userfile']['name']; 
	move_uploaded_file($_FILES['userfile']['tmp_name'], "avatar/".$_SESSION['MM_Id'].".jpg");
	
	?>
    <script>
		opener.document.form2.avatar.value="<?php echo $_SESSION['MM_Id']; ?>.jpg";
		self.close();
	</script>
    <?php
		}
}
else
{?>
<form action="subir_avatar.php" method="post" enctype="multipart/form-data" id="form2">
  <p>
    <input name="userfile" type="file">
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Subir Imagen">
  </p>
  <input type="hidden" name="enviado" value="form2" />
</form>
<?php }?>
</body>
</html>