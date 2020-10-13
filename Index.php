<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="Scripts/Eventos.js"></script>
    <link rel="stylesheet" href="Estilos/Estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="cargar()">
<div class="" id="contenedor">
    <div class="cabecera">
        <h1>Votemos</h1>
        <nav class="navegacion">
            <ul>
                <li><a href="#"id="men">Admin</a>
                <li><a href="Interfaces/Public/Estadisticas.php" >Estadisticas</a> </li>
                <li><a href="Interfaces/Public/Instructivo.php">Como voto??</a></li>
            </ul>
        </nav>
    </div>
    <div class="containerformu">
    <div  class="inactive" id="admin">
        <form  class="formularioadmin" action="Acciones/Ingresar.php" method="POST" >
            <h1 >Ingres&aacute; como administrad&oacute;r</h1>
            <br><br>
            <input type="number" placeholder="Clave" name="dni"  >
            <input type="submit" name="ingresar" value="Ingresar">
            <br>
            <input type="button" value="Cancelar" id="cancelar">
        </form>
    </div>
    </div>
    <div class="container" id="formulario">
        <form  class="formulario" action="Acciones/Ingresar.php" method="POST">
            <input type="number" placeholder="N°de Documento" name="dni" id="dni" onchange="validar()" >
            <p id="mensaje"></p>
            <br>
            <input type="submit" name="ingresar" value="Votar">
        </form>
    </div>
    <div class="container">
        <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    </div>
    
</div>
</body>
</html>