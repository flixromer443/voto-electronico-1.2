<!DOCTYPE html>
<html lang="en">
<head>
   <?php
         session_start();
         if(!isset($_SESSION["adminlistas"])){
            header("Location:../../Index.php");
         }
    ?>
   <?php
   
    
     $ruta = "../../Archivos/Listas/Listado.csv";
     if (!file_exists($ruta)){
         exit("Archivo no Encontrado por favor verifique");
     }
     $archivo=fopen($ruta,'r');
   ?>
   <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <script src="../../Scripts/Contador.js"></script>
    <script src="https://kit.fontawesome.com/d6fcbe9c4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Estilos/Estilo.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cabecera">
    <button class="buttonflecha"><a href="../Adminlistas.php"><i class="fas fa-arrow-left"></i> </a></button>
        <h1>Administrador de listas</h1>
        <nav class="navegacion">
            <ul>
                <li><a href="#"id="active" >Estadisticas</a> </li>
                <li><a  href="Generarlistas.php">Generar listas</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
    
       <?php 
      
      while(!feof($archivo)){
         $linea=fgets($archivo);
         $datos=explode('|',$linea);
         $id=trim($datos[0]);
         if(strlen($linea)>0){
            echo "<ul class='list-group'>
                     <li class='list-group-item active'><h2 style='text-align:center;'>Lista $datos[0]: $datos[1]</h2></li>
                     <li class='list-group-item active'>Presidente</li>
                     <li class='list-group-item'>Nombre y apellido:$datos[2] <br> N° de documento:$datos[3]$datos[4] <br> Sexo:";if($datos[5]=="F"){ echo "Femenino"; }else{echo "Masculino";}  echo "</li>
                     <li class='list-group-item active'>Vicepresidente</li>
                     <li class='list-group-item'>Nombre y apellido:$datos[6] <br> N° de documento:$datos[7]$datos[8] <br> Sexo:"; if($datos[9]=="F"){ echo "Femenino"; }else{echo "Masculino";} echo "</li>
                     <li class='list-group-item active'>Secretario</li>
                     <li class='list-group-item'>Nombre y apellido:$datos[10] <br> N° de documento:$datos[11]$datos[12] <br> Sexo:"; if($datos[13]=="F"){echo "Femenino";}else{echo "Masculino";} echo"</li>
                     <li class='list-group-item active'>Vocal</li>
                     <li class='list-group-item'>Nombre y apellido:$datos[14] <br> N° de documento:$datos[15]$datos[16] <br> Sexo:"; if($datos[17]=="F"){echo "Femenino";}else{echo "Masculino";} echo"</li>";
                     $archivo2=fopen("../../Archivos/Resultados/Lista$id.txt","r");
                     while(!feof($archivo2)){
                        $linea2=fgets($archivo2);
                        $datos2=explode("|",$linea2);
                        echo "<li class='list-group-item'><h3>Votos: $datos2[0]</h3></li>";
                     break;
                    }
                    fclose($archivo2);
               echo "</ul>";
            echo "<br><br>";   
         }
      }         
        
     fclose($archivo);?>
    </div>
     
    <div class="container"> 
    </div>
    <div>
        <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    </div>
   
</body>
</html>