<?php
$id=$_GET['id'];
$archivo=fopen("../../Archivos/Padrones/Registro.csv","r") or die ("error");
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        if($datos[0]==$id){
            header("Location:../../Errores/Admin/Error6.php");
        break;
        }
    }
    fclose($archivo);




if(!empty($id)){
    
    $bool=false;
    $data;
    $archivo=fopen("../../Archivos/Padrones/Padron.csv",'r');
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);

        $identificador=$datos[0];
        $nombre=$datos[1];
        $dni=$datos[2];
        $tipo_dni=$datos[3];
        $sexo=$datos[4];
        $mail=$datos[5];


        if($identificador==$id){

            $data[0]=$identificador;
            $data[1]=$nombre;
            $data[2]=$dni;
            $data[3]=$tipo_dni;
            $data[4]=$sexo;
            $data[5]=$mail;
          
        break;
//  pegar una ojeada aca!!
        }
    }fclose($archivo);
//    $id=$_GET['id'];
//    $consulta="SELECT * FROM ingresos WHERE id='$id'";
//    $res=mysqli_query($con,$consulta);
//    if(mysqli_num_rows($res)==1){
//        $datos=mysqli_fetch_array($res);
//        $nombre=$datos['Nombre'];
//        $apellido=$datos['Apellido'];
//        $contraseña=$datos['Contraseña'];
//    }
//
}?>
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
    <script src="../../Scripts/Listas/Editar.js"></script>
    <script src="https://kit.fontawesome.com/d6fcbe9c4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Estilos/Estilo.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="cargar()">
    <div class="cabecera">
    <button><a href="../Administrador.php"><i class="fas fa-arrow-left"></i> </a></button>
        <h1>Administrador</h1>
        <nav class="navegacion">
            <ul>
                <li><a href="Descargas.php">Descargas</a> </li>
                <li><a  href="Agregar.php">Agregar votantes</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
       <form  class="formulario" action="../../Acciones/Edicion_user.php" method="POST">
       <input type="hidden" name="id" value="<?php echo $data[0];?>">
       <input type="text" placeholder="Nombre y apellido" name="nombre" id="nombre" value="<?php echo $data[1]; ?>" >
            <br>
            <input type="number" placeholder="N°de Documento" name="dni" id="dni" value="<?php echo $data[2]; ?>" onchange="validar()">
            <p id="mensaje"></p>
            <br>
            <?php
                        $archivo=fopen("../../Archivos/Datos/Documentos.csv",'r');
                        $archivo2=fopen("../../Archivos/Datos/Types.csv",'r');
                        $x=0;
                        while(!feof($archivo)){
                            $linea=fgets($archivo);
                            $datos=explode("|",$linea);
                            while(!feof($archivo2)){
                                $linea2=fgets($archivo2);
                                $datos2=explode("|",$linea2);
                                while($x<7){?>
                                    <input  type='radio' name='tipo_dni' id="tipo_dni_vicepresidente" value='<?php echo $datos[$x]?>' <?php if($datos[$x]==$data[3])echo "checked";?> >
                                    <br>
                                    <label style="margin: 0px; padding:0px;" for='<?php echo $datos[$x] ?>'><?php echo "<h3>".$datos[$x].$datos2[$x]."</h3>"; ?></label>
                                    <br>

                                <?php $x++;} 

                            }
                        }
                        fclose($archivo);
                        fclose($archivo2);
                          ?>
                          <br>

<?php
                    $archivo=fopen("../../Archivos/Datos/Generos.csv",'r');
                    $archivo2=fopen("../../Archivos/Datos/Types_genero.csv",'r');
                    
                    while(!feof($archivo)){
                        $linea=fgets($archivo);
                        $datos=explode("|",$linea);
                        while(!feof($archivo2)){ 
                            $linea2=fgets($archivo2);
                            $datos2=explode("|",$linea2);
                            $i=0;
                        foreach($datos as $dato){?> 
                             <input type='checkbox' name="sexo" value='<?php echo $dato?>' <?php if($dato==$data[4]) echo "checked" ;?>>
                            <label  for='<?php $dato?>'><?php echo "<h3>".$datos2[$i]."</h3>";?></label>
                            <br>
                             
                            
                            <br>
                    <?php $i++; }
                     }
                     fclose($archivo2);}
                        fclose($archivo);?>
           
            <br>
            <input type="email" placeholder="***@gmail.com" name="email" id="email" value="<?php echo $data[5]; ?>" >
            <br>
            <input type="submit" name="Editar" value="Editar">
            
        </form>
    </div>
    <div class="container">
        <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    </div>
   
</body>
</html>