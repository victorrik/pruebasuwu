<?php
function uerreele()
{
	return 'https://universoyeschef.com';
}
function rellenarespacios($variable){
	$variable = str_replace(" ","%20", $variable);
    $variable = str_replace("\r\n", "~", $variable);
    $variable = str_replace(PHP_EOL,"~", $variable);
	return $variable;
}
function formatostotaldesconhoras($variable){
if (!is_numeric($variable)) {
	return "";
}
	 $dias = $variable/24;

$years = ($dias / 365) ; // days / 365 days
		$years = floor($years); // Remove all decimals

		$month = ($dias % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)

		$month = floor($month); // Remove all decimals

		$days = ($dias % 365) % 30.5; // the rest of days
  		if ($days == 0) {
  			
  		$days = ($dias % 365) % 31;
  		}

  		$años = "años";
  		$meses = "meses";
  		$diass = "días";
  		if ($years == 1) {
  			$años = "año";
  		}
  		if ($month == 1) {
  			$meses = "mes";
  		}
  		if ($days == 1) {
  			$diass = "día";
  		}

	return  $years.' '.$años.' | '.$month.' '.$meses.' | '.$days.' '.$diass;
}
 
function edad($value)
{date_default_timezone_set("America/Mexico_City");

	$dateOfBirth = $value;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
return $diff->format('%y');
}
 
function quitarsimbolos($value)
{	
	$arrayName = array('(',')',',','$','.','/','+','_' );
	$value = str_replace($arrayName,"", $value);
	return $value;
}
function uneysintildes($value)
{	
	$value = convert_accented_characters(quitarsimbolos($value)) ;
	return $value;
}

function checkimagen($value)
{	
	if(substr($value, -3) == "pdf"){return assetgeneral().'/img/pdf.png';}
	if ($value != "" && substr($value, -3) != "pdf"){  return $value; }
	 if($value == ""){ return assetgeneral().'/img/masgris.png';}
	 
}
function datesqltodate($fecha)
{
	return date('d/m/Y', strtotime(str_replace('-', '/',$fecha)));
}
function datetodatesql($fecha)
{
	return date('Y-m-d', strtotime(str_replace('/', '-',$fecha)));
}
function fechahora($fecha)
{
	return date('m/d/Y h:i:s', strtotime(str_replace('-', '/',$fecha)));
}

function CrearMsj($titulo, $subtitulo, $display_boton, $id='',$fecha=''){
	return
		'<html>'.
			'<head>'.
			'<style type="text/css">'.
			''.
				'.correo{'.
				  'position: relative;'.
				  'margin:auto;'.
				  'width: 650px;'.
				  'height: 550px;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 20px;'.
				'}'.
				''.
				'.tituloC{'.
				  'margin-top: -20px;'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 20px;'.
				  'display: block;'.
				  'width: 70%;'. 
				   'margin: auto;'. 
				'}'.
				''.
				'.subtituloC{'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 15px;'.
				  'display: inline-block;'.
				  'width: 100%;'.   
				'}'.
				''.
				'.head{'.
				  'background: blue;'.
				  'width: 100%;'.
				  'height: 30px;'.
				'}'. 
				''.
				'.body{'.
				  'background:#fff;'.
				  'color:#555;'.
				  'text-align: center;'.
				  'height: 520px;'.
				   'width: 100%;'.
				   'margin: auto;'. 
				   'color: rgb(0,0,0);'.
				   'overflow: auto;'.
				'}'.
				''.
				' .boton{'.
				  'margin: 20px auto;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 10px;'.
				  'padding: 12px 20px;'.
				  'border-radius: 10px;'.
				  'background: blue;'.
				  'color:white !important;'.
				  'cursor: pointer;'.
				  'width:100px;'.
				'}'.
				''.
				' .link{'.
				  'color:rgb(217,0,41);'.
				  'text-decoration: underline;'.
				'}'.
				''.
				'.contimg{'.
				  'height: 130px;'.
				  'width: 120px;'.
				  'border-radius: 0 0 20px 20px;'. 
				   'margin:  0px  auto;'. 
				   'opacity: 0.5;'. 
				'}'. 
				''.
				'.contimg img{'. 
				  'width: 100%;'. 
				'}'. 
				'.rojo{'. 
				  'color: red;'.   
				  'font-size: 18px;'. 
				  'font-weight: bold;'.  
				'}'. 
				'.negrote{'. 
				  'font-size: 25px;'. 
				  'font-weight: bold;'. 
				  'color: rgb(0,0,0);'.
				'}'.
				'.imgarriba{'. 
				  'width: 25px;'. 
				  ' '. 
				  ' '.
				'}'.
				'.letraspetit{'. 
				  'font-size: 10px;'. 
				  'font-weight: bold;'. 
				  ' '.
				'}'.
				''.
				'.display{ display:'.$display_boton.'}'.
			'</style>'.
			''.
			'<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">'.
			'</head>'.
			'<body>'.
				'<div class="correo" >'.
					''.
					'<div class="head" >   </div>'.
					''.
					'<div class="body">'.
						'<span class="tituloC" > '.$titulo.' </span>'.
						'<span class="subtituloC" >'.$subtitulo.'</span>'.
						'<br/>'.
						'<a class="boton display" href="https://universoyeschef.com/aviso/'.$id.'/'.$fecha.'" > Activar cuenta </a>'.
						'<div class="contimg"><img  src="https://universoyeschef.com/img/logos/GorritoMensaje2.png" alt="footer" /></div> '. 
						'<br/>'.
						'<span class="subtituloC" >Si tienes alguna duda estamos disponibles para ti en nuestras redes sociales, vía telefónica o enviando un correo a ayuda@universoyeschef.com</span>'.
						'<br/>'.
						'<br/>'.
						'<span class="letraspetit" >Copyright © 2019 Yes Chef ®. Todos los derechos reservados.</span>'.
						'<br/>'.
						'<br/>'.
					'</div>'.
				'</div>'.
			'</body>'.
		'</html>';
	}
	function CrearMsjn($titulo, $subtitulo, $display_boton, $id='',$fecha=''){
	return
		'<html>'.
			'<head>'.
			'<style type="text/css">'.
			''.
				'.correo{'.
				  'position: relative;'.
				  'margin:auto;'.
				  'width: 650px;'.
				  'height: 550px;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 20px;'.
				'}'.
				''.
				'.tituloC{'.
				  'margin-top: -20px;'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 20px;'.
				  'display: block;'.
				  'width: 70%;'. 
				   'margin: auto;'. 
				'}'.
				''.
				'.subtituloC{'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 15px;'.
				  'display: inline-block;'.
				  'width: 100%;'.   
				'}'.
				''.
				'.head{'.
				  'background: blue;'.
				  'width: 100%;'.
				  'height: 30px;'.
				'}'. 
				''.
				'.body{'.
				  'background:#fff;'.
				  'color:#555;'.
				  'text-align: center;'.
				  'height: 520px;'.
				   'width: 100%;'.
				   'margin: auto;'. 
				   'color: rgb(0,0,0);'.
				   'overflow: auto;'.
				'}'.
				''.
				' .boton{'.
				  'margin: 20px auto;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 10px;'.
				  'padding: 12px 20px;'.
				  'border-radius: 10px;'.
				  'background: blue;'.
				  'color:white !important;'.
				  'cursor: pointer;'.
				  'width:100px;'.
				'}'.
				''.
				' .link{'.
				  'color:rgb(217,0,41);'.
				  'text-decoration: underline;'.
				'}'.
				''.
				'.contimg{'.
				  'height: 130px;'.
				  'width: 120px;'.
				  'border-radius: 0 0 20px 20px;'. 
				   'margin:  0px  auto;'. 
				   'opacity: 0.5;'. 
				'}'. 
				''.
				'.contimg img{'. 
				  'width: 100%;'. 
				'}'. 
				'.rojo{'. 
				  'color: red;'.   
				  'font-size: 18px;'. 
				  'font-weight: bold;'.  
				'}'. 
				'.negrote{'. 
				  'font-size: 25px;'. 
				  'font-weight: bold;'. 
				  'color: rgb(0,0,0);'.
				'}'.
				'.imgarriba{'. 
				  'width: 25px;'. 
				  ' '. 
				  ' '.
				'}'.
				'.letraspetit{'. 
				  'font-size: 10px;'. 
				  'font-weight: bold;'. 
				  ' '.
				'}'.
				''.
				'.display{ display:'.$display_boton.'}'.
			'</style>'.
			''.
			'<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">'.
			'</head>'.
			'<body>'.
				'<div class="correo" >'.
					''.
					'<div class="head" >   </div>'.
					''.
					'<div class="body">'.
						'<span class="tituloC" > '.$titulo.' </span>'.
						'<span class="subtituloC" >'.$subtitulo.'</span>'.
						'<br/>'. 
						'<div class="contimg"><img  src="https://universoyeschef.com/img/logos/GorritoMensaje2.png" alt="footer" /></div> '. 
						'<br/>'.
						'<span class="subtituloC" >Si tienes alguna duda estamos disponibles para ti en nuestras redes sociales, vía telefónica o enviando un correo a ayuda@universoyeschef.com</span>'.
						'<br/>'.
						'<br/>'.
						'<span class="letraspetit" >Copyright © 2019 Yes Chef ®. Todos los derechos reservados.</span>'.
						'<br/>'.
						'<br/>'.
					'</div>'.
				'</div>'.
			'</body>'.
		'</html>';
	}
function CrearMsjadmin($titulo, $subtitulo, $display_boton, $id='',$fecha=''){
	return
		'<html>'.
			'<head>'.
			'<style type="text/css">'.
			''.
				'.correo{'.
				  'position: relative;'.
				  'margin:auto;'.
				  'width: 650px;'.
				  'height: 550px;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 20px;'.
				'}'.
				''.
				'.tituloC{'.
				  'margin-top: -20px;'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 20px;'.
				  'display: block;'.
				  'width: 70%;'. 
				   'margin: auto;'. 
				'}'.
				''.
				'.subtituloC{'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 15px;'.
				  'display: inline-block;'.
				  'width: 100%;'.   
				'}'.
				''.
				'.head{'.
				  'background: blue;'.
				  'width: 100%;'.
				  'height: 30px;'.
				'}'. 
				''.
				'.body{'.
				  'background:#fff;'.
				  'color:#555;'.
				  'text-align: center;'.
				  'height: 520px;'.
				   'width: 100%;'.
				   'margin: auto;'. 
				   'color: rgb(0,0,0);'.
				   'overflow: auto;'.
				'}'.
				''.
				' .boton{'.
				  'margin: 20px auto;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 10px;'.
				  'padding: 12px 20px;'.
				  'border-radius: 10px;'.
				  'background: blue;'.
				  'color:white !important;'.
				  'cursor: pointer;'.
				  'width:100px;'.
				'}'.
				''.
				' .link{'.
				  'color:rgb(217,0,41);'.
				  'text-decoration: underline;'.
				'}'.
				''.
				'.contimg{'.
				  'height: 130px;'.
				  'width: 120px;'.
				  'border-radius: 0 0 20px 20px;'. 
				   'margin:  0px  auto;'. 
				   'opacity: 0.5;'. 
				'}'. 
				''.
				'.contimg img{'. 
				  'width: 100%;'. 
				'}'. 
				'.rojo{'. 
				  'color: red;'.   
				  'font-size: 18px;'. 
				  'font-weight: bold;'.  
				'}'. 
				'.negrote{'. 
				  'font-size: 25px;'. 
				  'font-weight: bold;'. 
				  'color: rgb(0,0,0);'.
				'}'.
				'.imgarriba{'. 
				  'width: 25px;'. 
				  ' '. 
				  ' '.
				'}'.
				'.letraspetit{'. 
				  'font-size: 10px;'. 
				  'font-weight: bold;'. 
				  ' '.
				'}'.
				''.
				'.display{ display:'.$display_boton.'}'.
			'</style>'.
			''.
			'<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">'.
			'</head>'.
			'<body>'.
				'<div class="correo" >'.
					''.
					'<div class="head" >   </div>'.
					''.
					'<div class="body">'.
						'<span class="tituloC" > '.$titulo.' </span>'.
						'<span class="subtituloC" >'.$subtitulo.'</span>'.
						'<br/>'.
						'<a class="boton display" href="https://universoyeschef.com/activar/'.$id.'/'.$fecha.'" > Activar cuenta </a>'.
						'<div class="contimg"><img  src="https://universoyeschef.com/img/logos/GorritoMensaje2.png" alt="footer" /></div> '. 
						'<br/>'.
						'<span class="subtituloC" >Si tienes alguna duda estamos disponibles para ti en nuestras redes sociales, vía telefónica o enviando un correo a ayuda@universoyeschef.com</span>'.
						'<br/>'.
						'<br/>'.
						'<span class="letraspetit" >Copyright © 2019 Yes Chef ®. Todos los derechos reservados.</span>'.
						'<br/>'.
						'<br/>'.
					'</div>'.
				'</div>'.
			'</body>'.
		'</html>';
	} 

	function CrearMsjmager($titulo, $subtitulo, $display_boton, $id='',$fecha=''){
	return
		'<html>'.
			'<head>'.
			'<style type="text/css">'.
			''.
				'.correo{'.
				  'position: relative;'.
				  'margin:auto;'.
				  'width: 650px;'.
				  'height: 550px;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 20px;'.
				'}'.
				''.
				'.tituloC{'.
				  'margin-top: -20px;'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 20px;'.
				  'display: block;'.
				  'width: 70%;'. 
				   'margin: auto;'. 
				'}'.
				''.
				'.subtituloC{'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 15px;'.
				  'display: inline-block;'.
				  'width: 100%;'.   
				'}'.
				''.
				'.head{'.
				  'background: blue;'.
				  'width: 100%;'.
				  'height: 30px;'.
				'}'. 
				''.
				'.body{'.
				  'background:#fff;'.
				  'color:#555;'.
				  'text-align: center;'.
				  'height: 520px;'.
				   'width: 100%;'.
				   'margin: auto;'. 
				   'color: rgb(0,0,0);'.
				   'overflow: auto;'.
				'}'.
				''.
				' .boton{'.
				  'margin: 20px auto;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 10px;'.
				  'padding: 12px 20px;'.
				  'border-radius: 10px;'.
				  'background: blue;'.
				  'color:white !important;'.
				  'cursor: pointer;'.
				  'width:100px;'.
				'}'.
				''.
				' .link{'.
				  'color:rgb(217,0,41);'.
				  'text-decoration: underline;'.
				'}'.
				''.
				'.contimg{'.
				  'height: 130px;'.
				  'width: 120px;'.
				  'border-radius: 0 0 20px 20px;'. 
				   'margin:  0px  auto;'. 
				   'opacity: 0.5;'. 
				'}'. 
				''.
				'.contimg img{'. 
				  'width: 100%;'. 
				'}'. 
				'.rojo{'. 
				  'color: red;'.   
				  'font-size: 18px;'. 
				  'font-weight: bold;'.  
				'}'. 
				'.negrote{'. 
				  'font-size: 25px;'. 
				  'font-weight: bold;'. 
				  'color: rgb(0,0,0);'.
				'}'.
				'.imgarriba{'. 
				  'width: 25px;'. 
				  ' '. 
				  ' '.
				'}'.
				'.letraspetit{'. 
				  'font-size: 10px;'. 
				  'font-weight: bold;'. 
				  ' '.
				'}'.
				''. 
			'</style>'.
			''.
			'<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">'.
			'</head>'.
			'<body>'.
				'<div class="correo" >'.
					''.
					'<div class="head" >   </div>'.
					''.
					'<div class="body">'.
						'<span class="tituloC" > '.$titulo.' </span>'.
						'<span class="subtituloC" >'.$subtitulo.'</span>'.
						'<br/>'. 
						'<div class="contimg"><img  src="https://universoyeschef.com/img/logos/GorritoMensaje2.png" alt="footer" /></div> '. 
						'<br/>'.
						'<span class="subtituloC" >Si tienes alguna duda estamos disponibles para ti en nuestras redes sociales, vía telefónica o enviando un correo a ayuda@universoyeschef.com</span>'.
						'<br/>'.
						'<br/>'.
						'<span class="letraspetit" >Copyright © 2019 Yes Chef ®. Todos los derechos reservados.</span>'.
						'<br/>'.
						'<br/>'.
					'</div>'.
				'</div>'.
			'</body>'.
		'</html>';
	}
function errors($severity,$message,$filepath,$line,$errorfile,$errorline,$errorfunction){ 


 
		$titulo = 'Erresdela bendita pagina :3';
		//                CrearMsj($titulo,$subtitulo,$display_boton,$id=''){
		$mensaje = "severity<br>".$severity."<br><br><hr>message<br>".$message."<br><br><hr>filepath<br>".$filepath."<br><br><hr>line<br>".$line."<br><br><hr>errorfile<br>".$errorfile."<br><br><hr>errorline<br>".$errorline."<br><br><hr>errorfunction<br>".$errorfunction;
 $cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: contacto@universoyeschef.com>';
mail('victorrik@live.com.mx',"Errores prro", $mensaje, $cabeceras); 

}

function errors2($message){ 


 
		$titulo = 'Error al subir imagen';
		//                CrearMsj($titulo,$subtitulo,$display_boton,$id=''){
		$mensaje = "Error: ".$message;
 $cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: contacto@universoyeschef.com>';
mail('victorrik@live.com.mx',"Errores prro", $mensaje, $cabeceras); 
mail('fercho_1597@hotmail.com',"Errores de portafolio", $mensaje, $cabeceras); 

}

	/*
function CrearMsj($titulo, $subtitulo, $display_boton, $id='',$fecha=''){
	return
		'<html>'.
			'<head>'.
			'<style type="text/css">'.
			''.
				'.correo{'.
				  'margin:auto;'.
				  'width: 500px;'.
				  'height: 550px;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 20px;'.
				'}'.
				''.
				'.tituloC{'.
				  'margin-top: -20px;'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 20px;'.
				  'display: block;'.
				'}'.
				''.
				'.subtituloC{'.
				  'font-family: "Lato", sans-serif;'.
				  'font-size: 15px;'.
				  'display: inline-block;'.
				'}'.
				''.
				'.head{'.
				  'border-radius: 20px 20px 0 0;'.
				  'background:white;'.
				  'text-align:center;'.
				'}'.
				''.
				'.head .logoCorreo{'.
				  'height: 120px;'.
				  'width: 300px;'.
				'}'.
				''.
				'.body{'.
				  'background:#fff;'.
				  'color:#555;'.
				  'text-align: center;'.
				  'height: 100px;'.
				'}'.
				''.
				' .boton{'.
				  'margin: 20px auto;'.
				  'font-family: "Lato", sans-serif;'.
				  'border-radius: 10px;'.
				  'padding: 12px 20px;'.
				  'border-radius: 10px;'.
				  'background: rgb(0,125,255);'.
				  'color:white;'.
				  'cursor: pointer;'.
				  'width:100px;'.
				'}'.
				''.
				' .link{'.
				  'color:rgb(217,0,41);'.
				  'text-decoration: underline;'.
				'}'.
				''.
				'.img{'.
				  'height: 245px;'.
				  'width: 500px;'.
				  'border-radius: 0 0 20px 20px;'.
				'}'.
				''.
				'.display{ display:'.$display_boton.'}'.
			'</style>'.
			''.
			'<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">'.
			'</head>'.
			'<body>'.
				'<div class="correo" >'.
					''.
					'<div class="head" > <img class="logoCorreo" src="https://universoyeschef.com/img/logos/logocorreo.png" alt="YesChef" /> </div>'.
					''.
					'<div class="body">'.
						'<span class="tituloC" > '.$titulo.' </span>'.
						'<span class="subtituloC" >'.$subtitulo.'</span>'.
						'<br/>'.
						'<a class="boton display" href="https://yeschef.nibirusystem.com/aviso/'.$id.'/'.$fecha.'" > Activar cuenta </a>'.
						'<br/>'.
						'<br/>'.
						'<span class="subtituloC" >Si tienes alguna duda estamos disponibles para ti en nuestras redes sociales, vía telefónica o enviando un correo a ayuda@universoyeschef.com</span>'.
						'<br/>'.
						'<br/>'.
						'<span class="subtituloC" >Copyright © 2019 Yes Chef ®. Todos los derechos reservados.</span>'.
						'<br/>'.
						'<br/>'.
						'<img class="img" src="https://yeschef.nibirusystem.com/img/logos/footer.png" alt="footer" />'.
					'</div>'.
				'</div>'.
			'</body>'.
		'</html>';
	}*/