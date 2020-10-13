<?php
$id=$_GET['id'];

$archivo=fopen("../../Archivos/Votos/Votos.txt","r") or die ("error");
while(!feof($archivo)){
    $linea=fgets($archivo);
    $datos=explode("|",$linea);
    if(strlen($linea)>0){
        if($id==trim($datos[2])){
            header("Location:../../Errores/Adminlistas/Error6.php");
            exit;   
        }

    }

}
fclose($archivo);


if(!empty($id)){
    
    $bool=false;
    $data;
    $archivo=fopen("../../Archivos/Listas/Listado.csv",'r');
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);

        $identificador=$datos[0];
        $nombre=$datos[1];
        $presidente=$datos[2];
        $dni_presidente=$datos[3];
        $tipo_dni_presidente=$datos[4];
        $sexo_presidente=$datos[5];

        $vicepresidente=$datos[6];
        $dni_vicepresidente=$datos[7];
        $tipo_dni_vicepresidente=$datos[8];
        $sexo_vicepresidente=$datos[9];

        $secretario=$datos[10];
        $dni_secretario=$datos[11];
        $tipo_dni_secretario=$datos[12];
        $sexo_secretario=$datos[13];

        $vocal=$datos[14];
        $dni_vocal=$datos[15];
        $tipo_dni_vocal=$datos[16];
        $sexo_vocal=$datos[17];

        if($identificador==$id){
            

            $data[0]=$identificador;
            $data[1]=$nombre;
            $data[2]=$presidente;
            $data[3]=$dni_presidente;
            $data[4]=$tipo_dni_presidente;

            $data[5]=$sexo_presidente;
            $data[6]=$vicepresidente;
            $data[7]=$dni_vicepresidente;
            $data[8]=$tipo_dni_vicepresidente;
            $data[9]=$sexo_vicepresidente;

            $data[10]=$secretario;
            $data[11]=$dni_secretario;
            $data[12]=$tipo_dni_secretario;
            $data[13]=$sexo_secretario;

            $data[14]=$vocal;
            $data[15]=$dni_vocal;
            $data[16]=$tipo_dni_vocal;
            $data[17]=$sexo_vocal;
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
         if(!isset($_SESSION["adminlistas"])){
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
    <button><a href="../Adminlistas.php"><i class="fas fa-arrow-left"></i> </a></button>
        <h1>Administrador de listas</h1>
        <nav class="navegacion">
            <ul>
                <li><a href="Estadisticas.php" >Estadisticas</a> </li>
                <li><a  href="#" id="active">Generar listas</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
       <form  class="formulario" action="../../Acciones/Edicion.php" method="POST">
            <p id="mensaje">Lista</p> 
            <input type="hidden" name="id" value="<?php echo $id?>">
            <h2 for=""><?php echo $data[1];?></h2>
            <br> 
            <div id="step1"w >
            <p id="mensaje">Vicepresidente</p>    
                <input type="Text" placeholder="Vicepresidente" value="<?php echo $data[6];?>" name="vicepresidente" id="vicepresidente" >
                <br>
                <input type="Text" placeholder="N° de documento" value="<?php echo $data[7];?>" name="dni_vicepresidente" id="dni_vicepresidente" >
                <br>
                <div style="display: block; margin:auto; padding:20px 20px 20px 20px;" >
                <p id="mensaje">Tipo de documento</p> 
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
                                    <input  type='radio' name='tipo_dni_vicepresidente' id="tipo_dni_vicepresidente" value='<?php echo $datos[$x]?>' <?php if($datos[$x]==$data[8])echo "checked";?> >
                                    <br>
                                    <label style="margin: 0px; padding:0px;" for='<?php echo $datos[$x] ?>'><?php echo "<h3>".$datos[$x].$datos2[$x]."</h3>"; ?></label>
                                    <br>

                                <?php $x++;} 

                            }
                        }
                        fclose($archivo);
                        fclose($archivo2);
                          ?>
                    
                     
                <br><br>
                <div style="display: block; margin:auto; padding:15px 15px 15px 15px;" >
                <p id="mensaje">Genero</p> 
                <p id="mensaje">Por favor seleccione solamente 1</p> 

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
                             <input type='checkbox' name="sexo_vicepresidente" value='<?php echo $dato?>' <?php if($dato==$data[9]) echo "checked" ;?>>
                            <label  for='<?php $dato?>'><?php echo "<h3>".$datos2[$i]."</h3>";?></label>
                            <br>
                             
                            
                            <br>
                    <?php $i++; }
                     }
                     fclose($archivo2);}
                        fclose($archivo);?>
                     
                     </div>



                <br>
                <input type="button" value="Siguiente" id="btn1">
                </div>
            </div>
                <div id="step2" class="inactive">
                <p id="mensaje">Secretario</p>         
                <input type="Text" placeholder="Secretario" value="<?php echo $data[10];?>" name="secretario" id="secretario">
                <br>
                <input type="Text" placeholder="N° de documento" value="<?php echo $data[11];?>" name="dni_secretario" id="dni_secretario">
                <br>
                <div style="display: block; margin:auto; padding:20px 20px 20px 20px;"  >
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
                                    <input  type='radio' name='tipo_dni_secretario' id="tipo_dni_secretario" value='<?php echo $datos[$x]?>' <?php if($datos[$x]==$data[12])echo "checked";?> >
                                    <br>
                                    <label style="margin: 0px; padding:0px;" for='<?php echo $datos[$x] ?>'><?php echo "<h3>".$datos[$x].$datos2[$x]."</h3>"; ?></label>
                                    <br>

                                <?php $x++;} 

                            }
                        }
                        fclose($archivo);
                        fclose($archivo2);
                          ?>
                 </div>   
                <br><br>
                <div style="display: block; margin:auto; padding:15px 15px 15px 15px;" >
                <p id="mensaje">Genero</p> 
                <p id="mensaje">Por favor seleccione solamente 1</p> 

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
                              
                            <input type='checkbox' name="sexo_secretario" value='<?php echo $dato?>' <?php if($dato==$data[13]) echo "checked" ;?>>
                            <label  for='<?php $dato?>'><?php echo "<h3>".$datos2[$i]."</h3>";?></label>
                            <br>
                    <?php $i++; }
                     }
                     fclose($archivo2);}
                        fclose($archivo);?>
                     
                     </div>            
                <br><br>
                <input type="button" value="Volver" id="volver1">
                <input type="button" value="Siguiente" id="btn2">
            </div>
            <div id="step3" class="inactive">
                 <p id="mensaje">Vocal</p>
                 <input type="Text" placeholder="Vocal" value="<?php echo $data[14];?>" name="vocal" id="vocal">
                 <br>
                 <input type="Text" placeholder="N° de documento" value="<?php echo $data[15];?>" name="dni_vocal" id="dni_vocal" >
                 <br>
                 <div style="display: block; margin:auto; padding:20px 20px 20px 20px;"  >
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
                                    <input  type='radio' name='tipo_dni_vocal' id="tipo_dni_vocal" value='<?php echo $datos[$x]?>' <?php if($datos[$x]==$data[16])echo "checked";?> >
                                    <br>
                                    <label style="margin: 0px; padding:0px;" for='<?php echo $datos[$x] ?>'><?php echo "<h3>".$datos2[$x]."</h3>"; ?></label>
                                    <br>

                                <?php $x++;} 

                            }
                        }
                        fclose($archivo);
                        fclose($archivo2);
                          ?>

                    </div>        
                <br><br>
                <div style="display: block; margin:auto; padding:15px 15px 15px 15px;" >
                <p id="mensaje">Genero</p> 
                <p id="mensaje">Por favor seleccione solamente 1</p> 

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
                              
                            <input type='checkbox' name="sexo_vocal" value='<?php echo $dato?>' <?php if(trim($dato)==trim($data[17])) echo "checked" ;?>>
                            <label  for='<?php $dato?>'><?php echo "<h3>".$datos2[$i]."</h3>";?></label>
                            <br>
                    <?php $i++; }
                     }
                     fclose($archivo2);}
                        fclose($archivo);?>
                     
                     </div>    
                <br><br>
                <input type="button" value="Volver" id="volver2">
                <input type="submit" name="Editar" value="Editar">

                <div class="inactive" id="submit">
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