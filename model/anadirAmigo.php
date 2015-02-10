<?php
// Se importa para la conexión bd
include_once("../config/database.php");

// Se obtienen los datos mediante ajax
$usuario=$_POST['usuario'];
$amigo=$_POST['usu_amigo'];
// Variable para booleano para devolver un JSON
$exit;

// Se establece la colección
$collection=$bd->sigue_amigos;

// Se comprueba si existe el documento
$existe=$collection->find(array('usuario' => $usuario,'amigo' => $amigo));

// Si el array contiene datos
if($existe->count() == 0){

	// Se crea el array para guardar en la bd
	$document = array( 

		"usuario" => $usuario,
		"amigo" => $amigo

	);

	// Se inserta el documento en la colección llamado sigue_amigos
	$collection->insert($document);

	// Establece la variable
	$exit=true;
}
else{

	// Guarda el booleano false
	$exit=false;
}

// Devuelve el objeto JSON
echo json_encode(array('exito'=>$exit));
?>