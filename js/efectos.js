// JavaScript Document
function ver () {
	document.getElementById('recoger_login').style.display='block';
	}
function cerrar () {
	document.getElementById('recoger_login').style.display='none';
}

$(document).ready(function() {
$('#arriba').click(function(){ //Id del elemento cliqueable
$('html, body').animate({scrollTop:0}, 500);
return false;
});
});