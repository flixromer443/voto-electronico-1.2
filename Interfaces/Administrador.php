<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



    <script src="../Scripts/Eventos.js"></script>
    <script src="https://kit.fontawesome.com/d6fcbe9c4a.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-secondary">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a href="../Index.php" style="color: white;"><button class="btn btn-link"><i class="fas fa-arrow-left" style="font-size: 30px; color:white"></i> </button></a>
  <a class="navbar-brand" href="#">Administrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="Admin/Descargas.php">Descargas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Admin/Agregar.php">Agregar votantes</a>
      </li>
    </ul>
  </div>
</nav>
  
    <div class="container">
    <?php
        session_start();
        if(!isset($_SESSION['admin'])){
          header("Location:../Index.php");
        }
        $found=0;
        $cont=0;
        $archivo=fopen("../Archivos/Padrones/Padronvista.csv",'r');
        while(!feof($archivo)){
            $linea=fgets($archivo);
            
            $cont+=strlen($linea);
     

        }
        fclose($archivo);
        if($cont==0){
            $found=1;
        }
        elseif($cont>1){
            $found=0;
        }
        ?>
        <?php
        if($found==1){
            echo "<h1>Aun no se han agregado votantes</h1>"; 
        }
            if($found==0){

            
        
        ?>
    <br><br>
       
        <table class="table table-dark bg-dark">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre y apellido</th>
                  <th scope="col">N° de documento</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Sexo</th>
                  <th scope="col">Email</th>
              


                </tr>
              </thead>
             
       <?php 
       $archivo=fopen("../Archivos/Padrones/Padronvista.csv",'r');
     while(!feof($archivo)){
         $linea=fgets($archivo);
         $campos=explode("\t",$linea);
        echo "<tbody>";
        echo "<tr>";
              
        $i=strlen($campos[0]);
         if($i>0){
        
            
            echo "<td>$campos[0]</td>
                    <td>$campos[1]</td>
                    <td>$campos[2]</td>
                    <td>$campos[3]</td>
                   ";
            if($campos[4]=="F"){
                echo  "<td>Femenino</td>";
            }
            if($campos[4]=="M"){
                echo  "<td>Masculino</td>";
            }   
            echo "<td>$campos[5]</td>";

       
         echo"
         <div class='modal fade' id='exampleModal$campos[0]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
           <div class='modal-dialog'>
             <div class='modal-content'>
               <div class='modal-header'>
                 <h5 class='modal-title' id='exampleModalLabel'>Eliminar</h5>
                 <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                   <span aria-hidden='true'>&times;</span>
                 </button>
               </div>
               <div class='modal-body'>
                ¿deseas eliminar a $campos[1]?
               </div>
               <div class='modal-footer'>
                 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                 <form action='../Acciones/Eliminar_user.php' method='post'>
                             <input type='hidden' name='id' value='$campos[0]'/>
                         <button type='submit' class='btn btn-danger'>Eliminar</button>
                 </form>
               </div>
             </div>
           </div>
         </div> 
         
         <td>
                <button  data-toggle='modal' data-target='#exampleModal$campos[0]' style='width:50px; height:35px' class='btn btn-danger' >
                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                        </svg>
                    </button>
            <a href='Admin/Editar.php?id=$campos[0]'>
            <button class='btn btn-primary'  style='width:50px; height:35px'>
            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-brush' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd' d='M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.247-.013-.574.05-.88.479a11.01 11.01 0 0 0-.5.777l-.104.177c-.107.181-.213.362-.32.528-.206.317-.438.61-.76.861a7.127 7.127 0 0 0 2.657-.12c.559-.139.843-.569.993-1.06a3.121 3.121 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.591 1.927-5.566 4.66-7.302 6.792-.442.543-.796 1.243-1.042 1.826a11.507 11.507 0 0 0-.276.721l.575.575zm-4.973 3.04l.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043l.002.001h-.002z'/>
            </svg> 
            </button>
            </a>
            </td>";
      
        }
       
        echo "</tr>";
        echo "</tbody>"; 
               
      }
     fclose($archivo); }?> 
            </table>

    
    </div>

    <div class="container">
  <div class="row">
    <div class="col-sm-2">
          <a href="Admin/Reportes/Padron.php?<?php echo 'reportar';?>" target="_BLANK" >
            <button class="btn btn-primary">Reporte de padron</button>
          </a>
    </div>
    <div class="col-sm-3">
          <a href="Admin/Reportes/Padron_votos.php?<?php echo 'reportar';?>" target="_BLANK" >
            <button class="btn btn-primary">Reporte de padron de votos</button>
          </a>
    </div>
    <div class="col-sm-2">
          <a href="Adminlistas/Reportes/Listas.php?<?php echo 'reportar';?>" target="_BLANK" >
            <button class="btn btn-primary">Reporte de listas </button>
          </a>
    </div>
    <div class="col-sm-2">
          <a href="Adminlistas/Reportes/Estadisticas.php?<?php echo 'reportar';?>" target="_BLANK" >
            <button class="btn btn-primary">Reporte de Estadisticas </button>
          </a>
    </div>
    <div class="col-sm-3">
        <form  class="formulario" action="../Acciones/Cerraradmin.php" method="POST">
            <input type="submit" class="btn btn-light" name="Cerrar_sesion" value="Cerrar_sesion">
        </form>
    </div>
  </div>
</div>


    <div class="container" >
       
        <br>
       
    </div>
    <br>
    
        <footer style="background-color: rgb(14, 142, 165); text-align:center;margin:auto;">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    
   
</body>
</html>