<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en"> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Codificar cadenas.</title> 
</head> 

<body> 

<form method="POST" target="profor" action="codifica.php"> 
    <p align="center">Cadena a codificar: <input type="text" name="cadena" size="45">&nbsp;&nbsp; 
    <input type="submit" value="Codificar" name="B1"></p> 
</form> 

<p align="center"> 
<iframe src="codifica.php"   
marginwidth="0" marginheight="0" name="profor" scrolling="no" border="0" frameborder="0" width="800" height="500">  
</iframe>  
</p> 

</body> 

</html> 
----------------------------------------------------------------- 
--------- codifica.php 

<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="iso-8859-1" /> 
    <title>Codificación en PHP.</title> 

<style type="text/css">  
<!--   
.texto {       
    font-family: verdana,arial; 
    font-size: 1.0em; 
    color:#FF0000;  
}  
-->  
</style>  
</head> 

<body> 
<?php 
// Codificacion y decodificacion de cadenas y valores numericos 

$cadena = $_POST["cadena"]; 

if (empty($cadena))   
{   
echo "<p align=\"center\">Introduzca la cadena que desea codificar.</p>";   
}   
else   
{  

$cod_url = urlencode($cadena); 
$deco_url = urldecode($cod_url); 

$codifica1 = base64_encode($cadena); 
$decodifica2 = base64_decode($codifica1); 

$codifica3 = convert_uuencode($cadena); 
$decodifica4 = convert_uudecode($codifica3); 

// Codificado no reversible 
$codifica5 = md5($cadena); 

echo " 
<p> 
<b>Codificado con URLenconde: </b> 
<div class=\"texto\">$cod_url</div> 
Decodificado URLdecode: $deco_url  
</p> 

<p> 
<b>Codificado en base 64: </b> 
<div class=\"texto\">$codifica1</div> 
Decodificado en base 64: $decodifica2  
</p> 

<p> 
<b>Codificado seguro con algoritmo uuencode: </b> 
<div class=\"texto\">$codifica3</div> 
Decodificado seguro con algoritmo uuencode: $decodifica4  
</p> 

<p> 
<b>Codificación no reversible (MD5): </b> 
<div class=\"texto\">$codifica5</div> 
</p> 
"; 

} 

?> 
</body> 

</html>