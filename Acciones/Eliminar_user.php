<?php
   $id=$_POST['id'];
   $archivo=fopen("../Archivos/Padrones/Registro.csv","r") or die ("error");
   while(!feof($archivo)){
       $linea=fgets($archivo);
       $datos=explode("|",$linea);
       if($datos[0]==$id){
           header("Location:../Errores/Admin/Error7.php");
           exit;   
       }
   }
   fclose($archivo);





   $archivo=fopen("../Archivos/Padrones/Padron.csv","r");
   $archivo2=fopen("../Archivos/Padrones/Padrontemp.csv","a+");

    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode('|',$linea);
            
        $identificador=$datos[0];
   
         if($identificador!=$id && strlen(trim($linea))>0){
                fputs($archivo2,trim($datos[0]."|".$datos[1]."|".$datos[2]."|".$datos[3]."|".$datos[4].'|'.$datos[5])."\n");
         }

    }
    fclose($archivo);
    fclose($archivo2);
    unlink("../Archivos/Padrones/Padron.csv");
    rename("../Archivos/Padrones/Padrontemp.csv","../Archivos/Padrones/Padron.csv");
    header("Location:../Interfaces/Administrador.php");


    $archivo=fopen("../Archivos/Padrones/Padronvista.csv","r");
   $archivo2=fopen("../Archivos/Padrones/Padronvistatemp.csv","a+");

    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("\t",$linea);
        
       // 1|amigos|felix|42461205|(DNI)|F|facu|42471201|(DNI)|F|kajsdhkajshkdas|12312323|(DNI)|F|loca|98989989|(DNI)|F

        $identificador=$datos[0];
        
         if($identificador!=$id && strlen(trim($linea))>0){
                fputs($archivo2,trim($datos[0]."\t".$datos[1]."\t".$datos[2]."\t".$datos[3]."\t".$datos[4]."\t".$datos[5])."\n");
         }

    }
    fclose($archivo);
    fclose($archivo2);
    
    unlink("../Archivos/Padrones/Padronvista.csv");
    rename("../Archivos/Padrones/Padronvistatemp.csv","../Archivos/Padrones/Padronvista.csv");
    header("Location:../Interfaces/Administrador.php");
    
?>