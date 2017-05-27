<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//Usuarios online en la web
if (isset($_SESSION['MM_Id'])) {$usuarioconectado= $_SESSION['MM_Id'];}
	else{
	$usuarioconectado=0;
	
}
		$ip=$_SERVER['REMOTE_ADDR'];
		mysql_select_db($database_conexion, $conexion);
		$query_UserOnlineMio = sprintf("SELECT * FROM z_online WHERE z_online.ip = %s", GetSQLValueString($ip, "text"));
		$UserOnlineMio = mysql_query($query_UserOnlineMio, $conexion) or die(mysql_error());
		$row_UserOnlineMio = mysql_fetch_assoc($UserOnlineMio);
		$totalRows_UserOnlineMio = mysql_num_rows($UserOnlineMio);

		if ($totalRows_UserOnlineMio ==0){
			
       $insertSQL = sprintf("INSERT INTO z_online (date, usuarioOnline, ip) VALUES (%s, %s, %s)",
                       GetSQLValueString(time(), "text"),
					   GetSQLValueString($usuarioconectado, "int"),
                       GetSQLValueString($_SERVER['REMOTE_ADDR'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
}
	 
	 else {
	 $updateSQL = sprintf("UPDATE z_online SET date = %s, usuarioOnline = %s WHERE ip=%s",
							   GetSQLValueString (time(), "int"),
							   GetSQLValueString ($usuarioconectado, "int"),
							   GetSQLValueString($_SERVER['REMOTE_ADDR'], "text"));
	 mysql_select_db($database_conexion, $conexion);
     $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
}
		  
		  $time = 5 ;
		  $date = time() ;
		  $limite = $date-$time*60 ;
		  $deleteSQL = sprintf("DELETE FROM z_online WHERE date < %s",
							   GetSQLValueString($limite, "int"));
		
		  mysql_select_db($database_conexion, $conexion);
		  $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
		  
         mysql_select_db($database_conexion, $conexion);
		$query_UserOnlineMio = "SELECT * FROM z_online";
		$UserOnlineMio = mysql_query($query_UserOnlineMio, $conexion) or die(mysql_error());
		$row_UserOnlineMio = mysql_fetch_assoc($UserOnlineMio);
		$totalRows_UserOnlineMio = mysql_num_rows($UserOnlineMio);
		
		mysql_free_result($UserOnlineMio);
		
//Url amigables
function UrlAmigables($seo)
{
	
	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_Recordset13434 = sprintf ("SELECT z_posts.id FROM z_posts WHERE z_posts.urlamigable = '%s'" ,$seo);
	$Recordset13434 = mysql_query($query_Recordset13434, $conexion) or die(mysql_error());
	$row_Recordset13434 = mysql_fetch_assoc($Recordset13434);
	$totalRows_Recordset13434 = mysql_num_rows($Recordset13434);

    return $row_Recordset13434['id'];
	mysql_free_result($Recordset13434);
 
}	

//Url amigables
function UrlAmigablesInvertida($seo)
{
	
	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_Recordset13434 = sprintf ("SELECT z_posts.urlamigable FROM z_posts WHERE z_posts.id = '%s'" ,$seo);
	$Recordset13434 = mysql_query($query_Recordset13434, $conexion) or die(mysql_error());
	$row_Recordset13434 = mysql_fetch_assoc($Recordset13434);
	$totalRows_Recordset13434 = mysql_num_rows($Recordset13434);

    return $row_Recordset13434['urlamigable'];
	mysql_free_result($Recordset13434);
 
}	

//Sacar datos de la web
		mysql_select_db($database_conexion, $conexion);
		$query_SacarDatosWeb = "SELECT * FROM z_datos";
		$SacarDatosWeb = mysql_query($query_SacarDatosWeb, $conexion) or die(mysql_error());
		$row_SacarDatosWeb = mysql_fetch_assoc($SacarDatosWeb);
		$totalRows_SacarDatosWeb = mysql_num_rows($SacarDatosWeb);
		
		$urlWeb=$row_SacarDatosWeb['url'];
		$nombreWeb=$row_SacarDatosWeb['nombre'];
		$emailAdmin=$row_SacarDatosWeb['email'];
		
		mysql_free_result($SacarDatosWeb);


/////Saber si ya esta en favoritos
function ya_en_favoritos($usuario, $idpost)
{

	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_DatosFuncion = sprintf("SELECT * FROM z_favori WHERE usuario=%s AND post = %s", 
	GetSQLValueString($usuario, "int"),
	GetSQLValueString($idpost, "int"));
	$DatosFuncion = mysql_query($query_DatosFuncion, $conexion) or die(mysql_error());
	$row_DatosFuncion = mysql_fetch_assoc($DatosFuncion);
	$totalRows_DatosFuncion = mysql_num_rows($DatosFuncion);
	
	if ($totalRows_DatosFuncion=="") return true;
	else
	return false;

	mysql_free_result($DatosFuncion);
}

/////Saber si ya han votado
function YahasVotado($idvotante, $idppost)
{

	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_DatosFuncion = sprintf("SELECT * FROM z_puntos WHERE usuario = %s AND post = %s", 
	GetSQLValueString($idvotante, "int"),
	GetSQLValueString($idppost, "int"));
	$DatosFuncion = mysql_query($query_DatosFuncion, $conexion) or die(mysql_error());
	$row_DatosFuncion = mysql_fetch_assoc($DatosFuncion);
	$totalRows_DatosFuncion = mysql_num_rows($DatosFuncion);
	
	if ($totalRows_DatosFuncion =="") return true;
	else
	return false;
	
	
	mysql_free_result($DatosFuncion);
}

/**Quitar tildes y acentos para las keywords  */
function genera_key($keywords){
    $keywords = str_replace(' ', ', ', $keywords);
	$keywords = str_replace('?', '', $keywords);
	$keywords = str_replace('+', '', $keywords);
	$keywords = str_replace('??', '', $keywords);
	$keywords = str_replace('`', '', $keywords);
	$keywords = str_replace('!', '', $keywords);
	$keywords = str_replace('¿', '', $keywords);
	$originaleskey = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadaskey = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $keywords = strtr($keywords, utf8_decode($originaleskey), $modificadaskey);
    $keywords = strtolower($keywords);
   
    return utf8_encode($keywords);

}

/**Quitar tildes y acentos para las urls  */
function limpia_espacios($cadena, $idpost){
    $cadena = str_replace(' ', '-', $cadena);
	$cadena = str_replace('?', '', $cadena);
	$cadena = str_replace('+', '', $cadena);
	$cadena = str_replace(':', '', $cadena);
	$cadena = str_replace('??', '', $cadena);
	$cadena = str_replace('`', '', $cadena);
	$cadena = str_replace('!', '', $cadena);
	$cadena = str_replace('¿', '', $cadena);
	$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($idpost."/".$cadena);
   
    return utf8_encode($cadena);

}

//Saber mensajes sin leer de cada user
function saber_cuantos_estan_sin_leer ($idusuario) {
	
	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_DatosFuncion = sprintf("SELECT * FROM z_mensajes WHERE estado=0 AND recibe = %s", GetSQLValueString($idusuario, "int"));
	$DatosFuncion = mysql_query($query_DatosFuncion, $conexion) or die(mysql_error());
	$row_DatosFuncion = mysql_fetch_assoc($DatosFuncion);
	$totalRows_DatosFuncion = mysql_num_rows($DatosFuncion);
	
	
    return $totalRows_DatosFuncion;
	mysql_free_result($DatosFuncion);
}
	
/////Saber si hay un mensaje pendiente
function MensajesPendientes($usuario)
{

	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_DatosFuncion = sprintf("SELECT id FROM z_mensajes WHERE estado=0 AND recibe = %s", GetSQLValueString($usuario, "int"));
	$DatosFuncion = mysql_query($query_DatosFuncion, $conexion) or die(mysql_error());
	$row_DatosFuncion = mysql_fetch_assoc($DatosFuncion);
	$totalRows_DatosFuncion = mysql_num_rows($DatosFuncion);
	
	if ($totalRows_DatosFuncion>0) return true;
	else
	return false;

	mysql_free_result($DatosFuncion);
}

/////Saber si hay notificaciones pendientes
function NotificacionesPendientes($usuario)
{

	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_DatosFuncion = sprintf("SELECT * FROM z_notifica WHERE autor = %s AND estado=0", GetSQLValueString($usuario, "int"));
	$DatosFuncion = mysql_query($query_DatosFuncion, $conexion) or die(mysql_error());
	$row_DatosFuncion = mysql_fetch_assoc($DatosFuncion);
	$totalRows_DatosFuncion = mysql_num_rows($DatosFuncion);
	
	if ($totalRows_DatosFuncion>0) return true;
	else
	return false;

	mysql_free_result($DatosFuncion);
}

//Enviar un correo de mensaje nuevo
function notificar_por_correo ($emailderecibe,$urlWeb,$nombreWeb){
	
			$para      = $emailderecibe;
		$titulo = 'Tienes un nuevo mensaje en '.$nombreWeb;
		$mensaje = 'Tienes un nuevo mensaje datoweb '.$urlWeb ;
		$cabeceras = 'From: no_contestar@datoweb.com' . "\r\n" .
			'Reply-To: no_contestar@datoweb.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		
		mail($para, $titulo, $mensaje, $cabeceras);
	
}

//Sacar nombre a partir de id usuario
function nombre ($iduser){
	
	
			global $database_conexion, $conexion;
			mysql_select_db($database_conexion, $conexion);
			$query_ObtenerNombre = sprintf ("SELECT z_users.nombre FROM z_users WHERE z_users.id = %s",$iduser,"int");
			$ObtenerNombre = mysql_query($query_ObtenerNombre, $conexion) or die(mysql_error());
			$row_ObtenerNombre = mysql_fetch_assoc($ObtenerNombre);
			$totalRows_ObtenerNombre = mysql_num_rows($ObtenerNombre);
			
			return $row_ObtenerNombre['nombre'];
			mysql_free_result($ObtenerNombre);
	
}

//Sacar email a partir de id usuario
function email ($iduser){
	
	
			global $database_conexion, $conexion;
			mysql_select_db($database_conexion, $conexion);
			$query_ObtenerNombre = sprintf ("SELECT z_users.email FROM z_users WHERE z_users.id = %s",$iduser,"int");
			$ObtenerNombre = mysql_query($query_ObtenerNombre, $conexion) or die(mysql_error());
			$row_ObtenerNombre = mysql_fetch_assoc($ObtenerNombre);
			$totalRows_ObtenerNombre = mysql_num_rows($ObtenerNombre);
			
			return $row_ObtenerNombre['email'];
			mysql_free_result($ObtenerNombre);
	
}

//Sacar email a partir de id usuario
function sacararango ($iduser){
	
	
			global $database_conexion, $conexion;
			mysql_select_db($database_conexion, $conexion);
			$query_ObtenerNombre = sprintf ("SELECT z_users.rango FROM z_users WHERE z_users.id = %s",$iduser,"int");
			$ObtenerNombre = mysql_query($query_ObtenerNombre, $conexion) or die(mysql_error());
			$row_ObtenerNombre = mysql_fetch_assoc($ObtenerNombre);
			$totalRows_ObtenerNombre = mysql_num_rows($ObtenerNombre);
			
			return $row_ObtenerNombre['rango'];
			mysql_free_result($ObtenerNombre);
	
}

//Sacar email a partir de id usuario
function saber_titulo ($idpost){
	
	
			global $database_conexion, $conexion;
			mysql_select_db($database_conexion, $conexion);
			$query_ObtenerNombre = sprintf ("SELECT z_posts.titulo FROM z_posts WHERE z_posts.id = %s",$idpost,"int");
			$ObtenerNombre = mysql_query($query_ObtenerNombre, $conexion) or die(mysql_error());
			$row_ObtenerNombre = mysql_fetch_assoc($ObtenerNombre);
			$totalRows_ObtenerNombre = mysql_num_rows($ObtenerNombre);
			
			return $row_ObtenerNombre['titulo'];
			mysql_free_result($ObtenerNombre);
	
}

//Sacar autor mediante id del post
function saber_autor_de_post ($idpost){
	
	
			global $database_conexion, $conexion;
			mysql_select_db($database_conexion, $conexion);
			$query_ObtenerNombre = sprintf ("SELECT z_posts.autor FROM z_posts WHERE z_posts.id = %s",$idpost,"int");
			$ObtenerNombre = mysql_query($query_ObtenerNombre, $conexion) or die(mysql_error());
			$row_ObtenerNombre = mysql_fetch_assoc($ObtenerNombre);
			$totalRows_ObtenerNombre = mysql_num_rows($ObtenerNombre);
			
			return $row_ObtenerNombre['autor'];
			mysql_free_result($ObtenerNombre);
	
}

	
	//Sacar nombre a partir de id usuario
function recordar_sesion ($password,$username,$iduser){
	
	
			global $database_conexion, $conexion;
			setcookie("pass", $password, time() + (7 * 24 * 60 * 60),"/");  /* expira en una semana */
			setcookie("name", $username, time() + (7 * 24 * 60 * 60),"/");  /* expira en una semana */
			setcookie("identificador", $iduser, time() + (7 * 24 * 60 * 60),"/");  /* expira en una semana */
	
}
//Autologin
if (isset ($_COOKIE["pass"]) && isset ($_COOKIE["name"]) && isset ($_COOKIE["identificador"]) && !isset($_SESSION['MM_Id'])){
	
	 mysql_select_db($database_conexion, $conexion);
  
  $LoginRS__query=sprintf("SELECT nombre, password, id, rango FROM z_users WHERE nombre=%s OR email=%s AND password=%s AND rango>0",
  
    GetSQLValueString($_COOKIE["name"], "text"),
	GetSQLValueString($_COOKIE["name"], "text"),
	 GetSQLValueString($_COOKIE["pass"], "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
  $row_ObtenerDeUser = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $_COOKIE["name"];
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_Id'] = $_COOKIE["identificador"];
}
	
}

//Tiempo trascurrido funcion
function tiempo_transcurrido($fecha) {
	if(empty($fecha)) {
		  return "No hay fecha";
	}
   
	$intervalos = array("segundo", "minuto", "hora", utf8_decode("día"), "semana", "mes", utf8_decode("año"));
	$duraciones = array("60","60","24","7","4.35","12");
   
	$ahora = time();
	$Fecha_Unix = strtotime($fecha);
	
	if(empty($Fecha_Unix)) {   
		  return "Fecha incorracta";
	}
	if($ahora > $Fecha_Unix) {   
		  $diferencia     =$ahora - $Fecha_Unix;
		  $tiempo         = "Hace";
	} else {
		  $diferencia     = $Fecha_Unix -$ahora;
		  $tiempo         = "Dentro de";
	}
	for($j = 0; $diferencia >= $duraciones[$j] && $j < count($duraciones)-1; $j++) {
	  $diferencia /= $duraciones[$j];
	}
   
	$diferencia = round($diferencia);
	
	if($diferencia != 1) {
		$intervalos[5].="e"; //MESES
		$intervalos[$j].= "s";
	}
   
    return "$tiempo $diferencia $intervalos[$j]";
}

//Rangos usuarios
function rango ($rango){
	if ($rango=1) return "Principiante";
	if ($rango=2) return "Avanzado";
	if ($rango=3) return "Moderador";
	if ($rango=4) return "Administrador";
	
}


//Cerrar sesión

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['MM_Id'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['MM_Id']);
  unset($_SESSION['PrevUrl']);
  setcookie("pass", '', time() + (7 * 24 * 60 * 60),"/");  /* expira en una semana */
	setcookie("name", '', time() + (7 * 24 * 60 * 60),"/");  /* expira en una semana */
   setcookie("identificador", '', time() + (7 * 24 * 60 * 60),"/");  /* expira en una semana */
	
  $logoutGoTo = $urlWeb;
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

?>