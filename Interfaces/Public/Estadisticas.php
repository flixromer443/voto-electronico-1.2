<!DOCTYPE html>
<html lang="en">
<head>
    <?php //include("../../Funciones/Porcentajes.php");
    //$lista1=lista_A();
    //$lista2=lista_B();
    //$lista3=lista_C();
    //$lista4=lista_D();
    //$found=0;
    //$ruta1="../../Archivos/Listas/Listado.csv";
    //$ruta2="../../Archivos/Listas/Listadovista.csv";
    //
    //    
    //    $cont=0;
    //    $archivo=fopen($ruta1,'r');
    //    while(!feof($archivo)){
    //        $linea=fgets($archivo);
    //        
    //        $cont+=strlen($linea);
//
    //    }
    //    fclose($archivo);
    //    if($cont==0){
            $found=1;
    //    }
    //    elseif($cont>1){
    //        $found=0;
    //    }
    //    ?>
   
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/d6fcbe9c4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Estilos/Estilo.css">    
      <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: grey;">
    <div class="cabecera">
    <button class="buttonflecha"><a href="../../Index.php"><i class="fas fa-arrow-left"></i> </a></button>
        <h1>Votemos</h1>
        <nav class="navegacion">
            <ul>
                <li><a href="#"id="active" >Estadisticas</a> </li>
                <li><a  href="Instructivo.php" >Como voto??</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">

    <div class="container">
    <?php 
      $ruta = "../../Archivos/Listas/Listado.csv";
      if (!file_exists($ruta)){
          exit("Archivo no Encontrado por favor verifique");
      }
      $archivo=fopen($ruta,'r');      
      
      while(!feof($archivo)){
         $linea=fgets($archivo);
         $datos=explode('|',$linea);
         $id=trim($datos[0]);
         if(strlen($linea)>0){
            
                     $archivo2=fopen("../../Archivos/Resultados/Lista$id.txt","r");
                     while(!feof($archivo2)){
                        $linea2=fgets($archivo2);
                        $datos2=explode("|",$linea2);
                        echo "<li class='list-group-item'><h3>lista: $datos[1] <br> Votos: $datos2[0]</h3></li>";
                     break;
                    }
                    fclose($archivo2);
               echo "</ul>";
            echo "<br><br>";   
         }
      }        
        
     fclose($archivo);?>

        <script>
            window.onload(setTimeout(function(){window.location="Estadisticas.php"},20000))
        </script>
    
   
        
    </div>
    <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
   
</body>
</html>