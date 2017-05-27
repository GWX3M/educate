<?php require_once('Connections/conexion.php'); 

if (!isset ($_SESSION['MM_Id'])){
	header("Location: " . $urlWeb );

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload.css">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eDucate</title>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<script type="text/javascript" src="js/efectos.js"></script>
<script type="text/javascript" src="inc/ckeditor/ckeditor.js"></script>
<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
<div id="principal">
  <div id="head">
    <div id="logo">
      <h1><a href="<?php echo $urlWeb ?>">eDucate</a> </h1>
      El mejor sitio para aprender y compartir...
    </div>
    <div id="add468"><img src="img/educatelogo.jpg" width="468" height="60" /></div>
  </div>
  <?php include("inc/menu.php"); ?>
  <div id="leftt">
    <div id="section_l">
      <form action="<?php echo $urlWeb; ?>inc/add_post.php" method="post" name="form1" id="form1">
      	<input type="hidden" name="rUrl" value="" id="rUrl">
        <table align="center">
          <tr valign="baseline">
            <td><strong>Titulo</strong><br />              
            <input type="text" name="titulo" value="" size="52" /></td>
          </tr>
          <!--Upload-->
<tr valign="baseline">
<div class="container">
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Seleccionar Archivos...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress" style="width: 500px;">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
</div>
    </tr>
          <!--Upload-->
          <tr valign="baseline">
            <td><strong>Contenido</strong><br />            
            <textarea name="contenido" class="ckeditor"></textarea></td>
          </tr>
          <tr valign="baseline">
            <td><input type="submit" value="Agregar" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
      <p>&nbsp;</p>
    </div>
  </div>
  <div id="rigthh">
    <?php include("inc/buscador.php"); ?>
    <?php include("inc/stats.php"); ?>
    <?php include("inc/last_com.php"); ?>
    <?php include("inc/tags.php"); ?>
  </div>
</div><div id="footer"><div id="txt_fo"><a href="#">Pagina1</a> <a href="#">Pagina2</a> <a href="#">Pagina3</a> <a href="#">Pagina4</a></div>
<div class="item_top"><a href="" id="arriba">Subir Arriba</a></div>
</div>

<!-- scripts-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
            	$("#rUrl").val(file.name);
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
</body>
</html>