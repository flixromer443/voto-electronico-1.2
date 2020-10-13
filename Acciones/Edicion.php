<?php

  


    if(isset($_POST['Editar'])){
        
    //Vicepresidente
    $id=$_POST['id'];
    $vicepresidente=$_POST['vicepresidente'];
    $dni_vicepresidente=$_POST['dni_vicepresidente'];
    $tipo_dni_vicepresidente=$_POST['tipo_dni_vicepresidente'];
    $sexo_vicepresidente=$_POST['sexo_vicepresidente'];
    //echo $id.$vicepresidente.$dni_vicepresidente.$tipo_dni_vicepresidente.$sexo_vicepresidente;
    //echo "<br>";

    //Secretario
    $secretario=$_POST['secretario'];
    $dni_secretario=$_POST['dni_secretario'];
    $tipo_dni_secretario=$_POST['tipo_dni_secretario'];
    $sexo_secretario=$_POST['sexo_secretario'];
    //echo $secretario.$dni_secretario.$tipo_dni_secretario.$sexo_secretario;
    //echo "<br>";

    //Vocal
    $vocal=$_POST['vocal'];
    $dni_vocal=$_POST['dni_vocal'];
    $tipo_dni_vocal=$_POST['tipo_dni_vocal'];
    $sexo_vocal=$_POST['sexo_vocal'];
    //echo $vocal.$dni_vocal.$tipo_dni_vocal.$sexo_vocal;
    $archivo=fopen("../Archivos/Listas/Listado.csv","r") or die("error");
    $archivo2=fopen("../Archivos/Listas/Listadotemp.csv","a+") or die("error");
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        $identificador=$datos[0];
        if($datos[0]==""){
        break;
        }
        $nombre=$datos[1];
        $presidente=$datos[2];
        $dni_presidente=$datos[3];
        $tipo_dni_presidente=$datos[4];
        $sexo_presidente=$datos[5];
        $cont=0;
        if($identificador==$id && strlen(trim($linea))>0){
            $cont=1;
            fputs($archivo2,trim($id.'|'.$nombre.'|'.$presidente.'|'.$dni_presidente.'|'. $tipo_dni_presidente.'|'.$sexo_presidente.'|'.
                $vicepresidente.'|'.$dni_vicepresidente.'|'.$tipo_dni_vicepresidente.'|'.$sexo_vicepresidente.'|'.
                $secretario.'|'.$dni_secretario.'|'.$tipo_dni_secretario.'|'.$sexo_secretario.'|'.
                $vocal.'|'.$dni_vocal.'|'.$tipo_dni_vocal.'|'.$sexo_vocal)."\n");
        }
        if($cont==0){
           fputs($archivo2,trim($datos[0].'|'.$datos[1].'|'.$datos[2].'|'.$datos[3].'|'.$datos[4].'|'.$datos[5].'|'.$datos[6].'|'.$datos[7].'|'.$datos[8].'|'.$datos[9].'|'.$datos[10].'|'.$datos[11].'|'.$datos[12].'|'.$datos[13].'|'.$datos[14].'|'.$datos[15].'|'.$datos[16].'|'.$datos[17])."\n");    
        }
    }
    fclose($archivo);
    fclose($archivo2);
    unlink("../Archivos/Listas/Listado.csv");
    rename("../Archivos/Listas/Listadotemp.csv","../Archivos/Listas/Listado.csv");

    $archivo=fopen("../Archivos/Listas/Listadovista.csv",'r') or die("No se encontro");
    $archivo2=fopen("../Archivos/Listas/Listadovistatemp.csv","a+");
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("\t",$linea);
        if($datos[0]==""){
        break;
        }
        $identificador=$datos[0];
        $nombre=$datos[1];
        $presidente=$datos[2];
        $cont=0;
         if($identificador==$id && strlen(trim($linea))>0){
             $cont=1;
             fputs($archivo2,trim($id."\t".$nombre."\t".$presidente."\t".$vicepresidente."\t".$secretario."\t".$vocal)."\n");
         }
         if($cont==0){
            fputs($archivo2,trim($datos[0]."\t".$datos[1]."\t".$datos[2]."\t".$datos[3]."\t".$datos[4]."\t".$datos[5])."\n");
         }
    }
    fclose($archivo);
    fclose($archivo2);
    unlink("../Archivos/Listas/Listadovista.csv");
    rename("../Archivos/Listas/Listadovistatemp.csv","../Archivos/Listas/Listadovista.csv");  







    header("Location:../Alertas/Alerta5.php");
}
header("Location:../Interfaces/Adminlistas.php");

?>