<?php
     $identificador=$_POST['id'];

     $archivo=fopen("../Archivos/Votos/Votos.txt","r") or die ("error");
     while(!feof($archivo)){
         $linea=fgets($archivo);
         $datos=explode("|",$linea);
         if(strlen($linea)>0){
             if($identificador==trim($datos[2])){
                 header("Location:../Errores/Adminlistas/Error7.php");
                 exit;   
             }
     
         }
     
     }


    $archivo=fopen("../Archivos/Listas/Listado.csv",'r') or die("No se encontro");
    $archivo2=fopen("../Archivos/Listas/Listadotemp.csv","a+");

    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode('|',$linea);
       // 1|amigos|felix|42461205|(DNI)|F|facu|42471201|(DNI)|F|kajsdhkajshkdas|12312323|(DNI)|F|loca|98989989|(DNI)|F

        $id=$datos[0];
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

         //Ojo aca   
        $vocal=$datos[10];
        $dni_vocal=$datos[11];
        $tipo_dni_vocal=$datos[12];
        $sexo_vocal=$datos[13];
         if($identificador!=$id && strlen(trim($linea))>0){
                fputs($archivo2,trim($id.'|'.$nombre.'|'.$presidente.'|'.$dni_presidente.'|'. $tipo_dni_presidente.'|'.$sexo_presidente.'|'.
                $vicepresidente.'|'.$dni_vicepresidente.'|'.$tipo_dni_vicepresidente.'|'.$sexo_vicepresidente.'|'.
                $secretario.'|'.$dni_secretario.'|'.$tipo_dni_secretario.'|'.$sexo_secretario.'|'.
                $vocal.'|'.$dni_vocal.'|'.$tipo_dni_vocal.'|'.$sexo_vocal)."\n");
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
        $id=$datos[0];
        $nombre=$datos[1];
        $presidente=$datos[2];
        $vicepresidente=$datos[3];
        $secretario=$datos[4];
        $vocal=$datos[5];
        echo $secretario;
         if($identificador!=$id && strlen(trim($linea))>0){
                fputs($archivo2,trim($id."\t".$nombre."\t".$presidente."\t".$vicepresidente."\t".$secretario."\t".$vocal)."\n");
         }
    }
    fclose($archivo);
    unlink("../Archivos/Listas/Listadovista.csv");
    rename("../Archivos/Listas/Listadovistatemp.csv","../Archivos/Listas/Listadovista.csv");  
    $id=trim($identificador);
    unlink("../Archivos/Resultados/Lista$id.txt");
    header("Location:../Interfaces/Adminlistas.php");


  //  11|Amigos|Felix|42471205|(DNI)|M|Facu|42471200|(TP)|M|Walter|12123123|(CI)|F|Franco|76765765|(CI)|M
  //11	Amigos	Felix	Facu	Walter	Franco


?>