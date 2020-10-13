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
    <button class="buttonflecha"> <a href="../Administrador.php"><i class="fas fa-arrow-left"></i> </a></button>
        <h1>Administrador</h1>
        <nav class="navegacion">
            <ul>
                <li><a href="Descargas.php" >Descargas</a> </li>
                <li><a  href="#" id="active">Agregar votante</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
       <form  class="formulario" action="../../Acciones/Insertar.php" method="POST">
            <input type="text" placeholder="Nombre y apellido" name="nombre" id="nombre" >
            <br>
            <input type="number" placeholder="N°de Documento" name="dni" id="dni" onchange="validar()">
            <p id="mensaje"></p>
            <br>
            <select name="tipo_dni" id="">
                    <option value="(DNI)">Documento nacional de identidad (DNI)</option>
                    <option value="(DUI)">Documento único de identidad (DUI)</option>
                    <option value="(CI)">Cédula de identidad (CI)</option>
                    <option value="(CC)">Cédula de ciudadanía (CC)</option>
                    <option value="(TI)">Tarjeta de identidad (TI)</option>
                    <option value="(TP)">Tarjeta pasaporte (TP)</option>
                    <option value="(CI)">Carné de identidad (CI)</option>
            </select>
            <br><br>
            <select name="sexo" id="">
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
            </select>
            <br>
            <input type="email" placeholder="***@gmail.com" name="email" id="email" >
            <br>
            <input type="submit" name="insertar" value="Agregar">
        </form>
    </div>
    <div class="container">
        <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    </div>
   
</body>
</html>