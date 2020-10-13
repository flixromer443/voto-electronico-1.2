<?php

if(isset($_POST['Editar'])){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $dni=$_POST['dni'];
    $tipo_dni=$_POST['tipo_dni'];
    $sexo=$_POST['sexo'];
    $mail=$_POST['email'];

    $archivo=fopen("../Archivos/Padrones/Padron.csv","r") or die("error");
    $archivo2=fopen("../Archivos/Padrones/Padrontemp.csv","a+") or die("error");
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        $identificador=$datos[0];
        if($datos[0]==""){
        break;
        }
       
        $cont=0;
        if($identificador==$id && strlen(trim($linea))>0){
            $cont=1;
            fputs($archivo2,trim($id.'|'.$nombre.'|'.$dni.'|'.$tipo_dni.'|'.$sexo.'|'.$mail)."\n");
        }
        if($cont==0){
           fputs($archivo2,trim($datos[0].'|'.$datos[1].'|'.$datos[2].'|'.$datos[3].'|'.$datos[4].'|'.$datos[5].'|'.$datos[6])."\n");    
        }
    }
    fclose($archivo);
    fclose($archivo2);
    unlink("../Archivos/Padrones/Padron.csv");
    rename("../Archivos/Padrones/Padrontemp.csv","../Archivos/Padrones/Padron.csv");



    $archivo=fopen("../Archivos/Padrones/Padronvista.csv","r") or die("error");
    $archivo2=fopen("../Archivos/Padrones/Padronvistatemp.csv","a+") or die("error");
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("\t",$linea);
        $identificador=$datos[0];
        if($datos[0]==""){
        break;
        }
       
        $cont=0;
        if($identificador==$id && strlen(trim($linea))>0){
            $cont=1;
            fputs($archivo2,trim($id."\t".$nombre."\t".$dni."\t".$tipo_dni."\t".$sexo."\t".$mail)."\n");
        }
        if($cont==0){
           fputs($archivo2,trim($datos[0]."\t".$datos[1]."\t".$datos[2]."\t".$datos[3]."\t".$datos[4]."\t".$datos[5]."\t".$datos[6])."\n");    
        }
    }
    fclose($archivo);
    fclose($archivo2);
    unlink("../Archivos/Padrones/Padronvista.csv");
    rename("../Archivos/Padrones/Padronvistatemp.csv","../Archivos/Padrones/Padronvista.csv");






    header("Location:../Alertas/Alerta6.php");
    exit;

}
header("Location:../Interfaces/Administrador.php");

?>