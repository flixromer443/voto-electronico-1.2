<?php
//por el momento se queda en index
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location:../Index.php");
}
elseif($_SESSION['usuario']['estado']==1){
    header("Location:../Alertas/Alerta2.php");
    exit;
}
$id_user=$_SESSION['usuario']['id'];
$dni=$_SESSION['usuario']['dni'];

    $ruta = "../Archivos/Listas/Listadovista.csv";
          
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d6fcbe9c4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/Estilo.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="" id="contenedor">
    <div class="cabecera">
        <h1>Votemos</h1>
    </div>
 
   <div>
    <div class="alert alert-success" role="alert">
    <h2 id="mensaje" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg> Usted se ha acreditado como <br> <?php echo $_SESSION['usuario']['nombre']; ?></h2>
</div>

    
    </div>
    <div class="container">
        <div class="row">
            <?php
                $archivo=fopen($ruta,"r");
                while(!feof($archivo)){
                    $linea=fgets($archivo);
                    $datos=explode("\t",$linea);
                    if(strlen($linea)>0){

                        echo "
                        <button type='button' style='margin:20px 20px 20px 20px; font-size:20px;' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal$datos[0]'>
                        $datos[1]
                        </button>
                        
                        <!-- Modal -->
                        <div class='modal fade' id='exampleModal$datos[0]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Votar</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>
                              <div class='modal-body'>
                               ¿deseas votar por la lista $datos[1]?
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                <form action='../Acciones/Votar.php' method='POST'>
                                            <input type='hidden' name='dni' value='$dni'>
                                            <input type='hidden' name='id_user' value='$id_user'/>
                                            <input type='hidden' name='id_lista' value='$datos[0]'/>
                                        <button type='submit' class='btn btn-primary'>Votar</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div> ";

                    }

                }
                fclose($archivo);
            ?>
        </div>

    </div>
        

    <div class="container" style="margin-left:0px;">
     <?php
     echo "<ul class='list-group'>
            <li class='list-group-item active'>Lista  Presidente  Vicepresidente  Secretario  Vocal</li>
            </ul>";

       $archivo=fopen($ruta,"r");
        while(!feof($archivo)){
            $linea=fgets($archivo);
            $datos=explode("\t",$linea);
            if(strlen($linea)>0){
                echo "<ul class='list-group'>
                <li class='list-group-item'>$datos[1]  $datos[2]  $datos[3]  $datos[4]</li>
                 </ul>"; 
            }
           
        }
         fclose($archivo);  
     
     ?>
  </div>
        <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    
    </div>
</body>
</html>