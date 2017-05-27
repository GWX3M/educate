<?php require_once('../Connections/conexion.php'); ?>
<?php 

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['nombre'])) {
  $loginUsername=$_POST['nombre'];
  $password=md5($_POST['password']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "../index.php";
  $MM_redirectLoginFailed = $urlWeb."user/error.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexion, $conexion);
  
	 
	 
	   //ESTA CONSULTA SI ES SEGURA!!!!!!!!!!
     $LoginRS__query=sprintf("SELECT nombre, password, id, rango FROM z_users WHERE password=%s AND nombre=%s OR password=%s AND email=%s AND rango>0",
  
    GetSQLValueString($password, "text"),
	GetSQLValueString($loginUsername, "text"),
	GetSQLValueString($password, "text"),
	GetSQLValueString($loginUsername, "text")); 
	 

   
  $LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
  $row_ObtenerDeUser = mysql_fetch_assoc($LoginRS);
  
  	 	$updateSQL = sprintf("UPDATE z_users SET ultima=now() WHERE id=%s",
                       GetSQLValueString($row_ObtenerDeUser['id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_Id'] = $row_ObtenerDeUser['id'];	     	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
	if (isset ($_POST['recordar']) && $_POST['recordar']=="on"){
		recordar_sesion($password,$_SESSION['MM_Username'],$_SESSION['MM_Id']);
		}
    header("Location:".$_SERVER['HTTP_REFERER']); 
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}?>
