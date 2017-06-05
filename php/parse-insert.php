<?php
//Archivo para utilizar MongoDB
require_once ("../vendor/autoload.php");
//URL de la base de datos
$cliente = new MongoDB\Client("mongodb://localhost:27017");
//BBDD
$bbdd = $cliente->videojuegos->juegos;
//Borrar base de datos
$bbdd->drop();

//PARSEAR HTML
//Recoger el html plano de la página
$html = file_get_contents("https://en.wikipedia.org/wiki/List_of_Sega_arcade_video_games");

//Creamos objetos para poder recorrer el html de la página
$dom = new DOMDocument();
$dom->loadHTML($html);
$finder = new DOMXPath($dom);

//Lista de objetos que son <li>
$juegos = $finder->query('//ul/li');

//Array de datos para introducir titulos
//Recorrer la lista de juegos
foreach ($juegos as $juego){
    //Recoger el título. Como está entre las etiquetas <i>, decimos que queremos esos elementos
    $titulos = $juego->getElementsByTagName('i');
    //Recorrer todos los títulos
    foreach ($titulos as $titulo){
        //echo $titulo->nodeValue."<br/>";
        //Agregarlos al array
        $tituloJuego = $titulo->nodeValue;
        $bbdd->insertOne(["nombre"=>strtoupper($tituloJuego)]);
    }
    
}
// echo sizeof($datos);
// echo $datos[0];

// $resultado = $bbdd->find();
// foreach ($resultado as $res){
//     echo $res['nombre']."<br/>";
// }
?>