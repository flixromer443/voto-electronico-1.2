<!DOCTYPE html>
<html lang="en">
<head>
    <?php
         session_start();
         if(!isset($_SESSION["adminlistas"])){
            header("Location:../../Index.php");
         }
    ?>
    <meta charset="UTF-8">
    <script src="../../Scripts/Listas/listas.js"></script>
    <script src="https://kit.fontawesome.com/d6fcbe9c4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Estilos/Estilo.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="cargar()">
    <div class="cabecera">
    <button class="buttonflecha"><a href="../Adminlistas.php"><i class="fas fa-arrow-left"></i> </a></button>
        <h1>Administrador de listas</h1>
        <nav class="navegacion">
            <ul>
                <li><a href="Estadisticas.php" >Estadisticas</a> </li>
                <li><a  href="#" id="active">Generar listas</a></li>
            </ul>
        </nav>
    </div>
   
    <div class="container">
       <form  class="formulario" action="../../Acciones/Generar.php" method="POST">
            <input type="text" placeholder="Nombre de la lista" name="nombre" id="nombre" >
            <br> <p id="mensaje"> Integrantes </p>
            <div id="step1" >    
                <input type="Text" placeholder="Presidente"  name="presidente" id="presidente" >
                <br>
                <input type="number" placeholder="N° de documento" name="dni_presidente" id="dni_presidente">
                <br>
                <select name="tipo_dni_presidente" id="">
                    <option value="(DNI)">Documento nacional de identidad (DNI)</option>
                    <option value="(DUI)">Documento único de identidad (DUI)</option>
                    <option value="(CI)">Cédula de identidad (CI)</option>
                    <option value="(CC)">Cédula de ciudadanía (CC)</option>
                    <option value="(TI)">Tarjeta de identidad (TI)</option>
                    <option value="(TP)">Tarjeta pasaporte (TP)</option>
                    <option value="(CI)">Carné de identidad (CI)</option>
                </select>
                <br><br>
                <select name="sexo_presidente" id="">
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
                <br><br>
                <input type="button" value="Siguiente" id="btn1">
            </div>
            <div id="step2" class="inactive">      
                <input type="Text" placeholder="Vicepresidente" name="vicepresidente" id="vicepresidente" >
                <br>
                <input type="Text" placeholder="N° de documento" name="dni_vicepresidente" id="dni_vicepresidente" >
                <br>
                <select name="tipo_dni_vicepresidente" id="">
                    <option value="(DNI)">Documento nacional de identidad (DNI)</option>
                    <option value="(DUI)">Documento único de identidad (DUI)</option>
                    <option value="(CI)">Cédula de identidad (CI)</option>
                    <option value="(CC)">Cédula de ciudadanía (CC)</option>
                    <option value="(TI)">Tarjeta de identidad (TI)</option>
                    <option value="(TP)">Tarjeta pasaporte (TP)</option>
                    <option value="(CI)">Carné de identidad (CI)</option>
                </select>
                <br><br>
                <select name="sexo_vicepresidente" id="">
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
                <br><br>
                <input type="button" value="Volver" id="volver1">
                <input type="button" value="Siguiente" id="btn2">
            </div>
            <p id="mensaje"></p>
            <div id="step3" class="inactive">     
                <input type="Text" placeholder="Secretario" name="secretario" id="secretario">
                <br>
                <input type="Text" placeholder="N° de documento" name="dni_secretario" id="dni_secretario">
                <br>
                <select name="tipo_dni_secretario" id="">
                    <option value="(DNI)">Documento nacional de identidad (DNI)</option>
                    <option value="(DUI)">Documento único de identidad (DUI)</option>
                    <option value="(CI)">Cédula de identidad (CI)</option>
                    <option value="(CC)">Cédula de ciudadanía (CC)</option>
                    <option value="(TI)">Tarjeta de identidad (TI)</option>
                    <option value="(TP)">Tarjeta pasaporte (TP)</option>
                    <option value="(CI)">Carné de identidad (CI)</option>
                </select>
                <br><br>
                <select name="sexo_secretario" id="">
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
                <br><br>
                <input type="button" value="Volver" id="volver2">
                <input type="button" value="Siguiente" id="btn3">
            </div>
            <div id="step4" class="inactive">
                 <input type="Text" placeholder="Vocal" name="vocal" id="vocal">
                 <br>
                 <input type="Text" placeholder="N° de documento" name="dni_vocal" id="dni_vocal" >
                 <br>
                 <select name="tipo_dni_vocal" id="">
                    <option value="(DNI)">Documento nacional de identidad (DNI)</option>
                    <option value="(DUI)">Documento único de identidad (DUI)</option>
                    <option value="(CI)">Cédula de identidad (CI)</option>
                    <option value="(CC)">Cédula de ciudadanía (CC)</option>
                    <option value="(TI)">Tarjeta de identidad (TI)</option>
                    <option value="(TP)">Tarjeta pasaporte (TP)</option>
                    <option value="(CI)">Carné de identidad (CI)</option>
                </select>
                <br><br>
                <select name="sexo_vocal" id="">
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
                <br><br>
                 <input type="button" value="Volver" id="volver3">
                 <br>
                 <div class="inactive" id="submit">
                 <input type="submit" name="generar" value="Generar">
                 </div>
            </div>
            <p id="mensaje"></p>
            <br>            
        </form>
    </div>
    <div class="container">
        <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    </div>
   
</body>
</html>