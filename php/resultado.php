<?php
require_once ("../vendor/autoload.php");
$cliente = new MongoDB\Client("mongodb://localhost:27017");
$bbdd = $cliente->videojuegos->juegos;

$busqueda = $_POST["busqueda"];


if(!empty($busqueda)){
    //Hacemos un split para que las búsquedas
    $busquedas = preg_split("/[\s,]+/", $busqueda);
    foreach($busquedas as $busqueda){
        //Con esto busca tanto mayusculas, minusculas como palabras que contengan las letras
        $resultado = $bbdd->find(array('nombre' => array('$regex'=> $busqueda.'.*', '$options'=> 'i' )));
        foreach ($resultado as $result){
            ?>
            <p><?php echo $result['nombre']; ?></p>
            <?php
        }
    }
    
}else{
   
}

?>