<!DOCTYPE html>
<html lang="en">
<head>
<?php
         session_start();
         if(!isset($_SESSION["admin"])){
            header("Location:../../Index.php");
         }
    ?>
    <meta charset="UTF-8">
    <script src="../../Scripts/Eventos.js"></script>
    <script src="https://kit.fontawesome.com/d6fcbe9c4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Estilos/Estilo.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
    <div class="cabecera">
    <button class="buttonflecha"><a href="../Administrador.php"><i class="fas fa-arrow-left"></i> </a></button>
        <h1>Administrador</h1>
        <nav class="navegacion">
            <ul>
                <li><a href="#" id="active" >Descargas</a> </li>
                <li><a  href="Agregar.php">Agregar votante</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="formulario">
            <a href="../../Archivos/Padrones/Padron.csv">Padron.csv</a>
            <br>
            <br>
            <a href="../../Archivos/Padrones/Registro.csv">Registros.csv</a>
            <br>
            <br>
            <a href="../../Archivos/Listas/Listado.csv">Listas.csv</a>
        </div>
            
    </div>
    <div class="container">
        <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    </div>
   
</body>
</html>