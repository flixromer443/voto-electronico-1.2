<?php
//Agregar votante al padron
//Agregar excel y pdf!!

function verificar($dni,$tipo_dni,$mail){
    $archivo=fopen("../Archivos/Padrones/Padron.csv","r") or die("error");
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode("|",$linea);
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            return 2;
        }
        if(trim($mail)==trim($datos[5])){
            return 1;
        }
        if(trim($dni)==trim($datos[2])&&trim($tipo_dni)==trim($datos[3]) ){
            return 1;
        }
    }
    fclose($archivo);
    
}















function agregar($nom,$doc,$tipodoc,$sexo,$email){
    $estado="No voto";
    $cont=0;
    $archivo=fopen("../Archivos/Padrones/id.txt","r")or die("error");
    while(!feof($archivo)){
        $fila=fgets($archivo);
        $datos=explode("\t",$fila);
        $cont=$datos[0]+1;

    }
 fclose($archivo);
 $archivo=fopen("../Archivos/Padrones/id.txt","w+")or die("error");
    while(!feof($archivo)){
        $fila=fgets($archivo);
        $datos=explode("\t",$fila);
        fputs($archivo,$cont);

    }
 fclose($archivo);
    $archivo=fopen("../Archivos/Padrones/Padronvista.csv","a")or die("error");
       while(!feof($archivo)){
           $fila=fgets($archivo);
           $datos=explode("\t",$fila);
           $datos[0]=$nom;           
           $datos[1]=$doc;
           $datos[2]=$tipodoc;
           $datos[3]=$sexo;
           $datos[4]=$email;
           if(strlen($fila)>0){
            fputs($archivo,"\n".$cont."\t".$nom."\t".$doc."\t".$tipodoc."\t".$sexo."\t".$email."\n");
        break;
           }
           fputs($archivo,$cont."\t".$nom."\t".$doc."\t".$tipodoc."\t".$sexo."\t".$email."\n");
           break;

       }
       fclose($archivo);
       $archivo=fopen("../Archivos/Padrones/Padron.csv","a")or die("error");
       while(!feof($archivo)){
           $fila=fgets($archivo);
           $datos=explode("|",$fila);
           $datos[0]=$nom;           
           $datos[1]=$doc; 
           $datos[2]=$tipodoc;
           $datos[3]=$sexo;
           $datos[4]=$email;
           $datos[5]=$estado;
           $enviar=$cont.'|'.$nom."|".$doc.'|'.$tipodoc.'|'.$sexo.'|'.$email."\n";
           fputs($archivo,$enviar);
       break;
       }
      // $archivo=fopen("../Archivos/Padrones/Novotaron.csv","a+")or die("error");
      // while(!feof($archivo)){
        //   $fila=fgets($archivo);
          // $datos=explode("|",$fila);
          // $datos[0]=$nom;           
           //$datos[1]=$ap;
           //$datos[2]=$doc; 
           //$datos[3]=$estado;
           //$enviar=$nom."|".$ap."|".$doc."|".$estado."\n";
           //fputs($archivo,$enviar);
           //break;           
      // }
}
?>