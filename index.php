<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="./js/index.js"></script>
    <title>Buscador de Videojuegos</title>
</head>
<body>
    <form>
        <input type="text" id="busqueda" placeholder="Nombre del juego">
        <input type="button" value="Buscar" onclick="mostrar()">
    </form>
    <div id="resultado"></div>
</body>
</html>