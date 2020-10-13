<?php

    function generar($nombre,$presidente,$dni_presidente,$tipo_dni_presidente,$sexo_presidente,$vicepresidente,$dni_vicepresidente,$tipo_dni_vicepresidente,$sexo_vicepresidente,$secretario,$dni_secretario,$tipo_dni_secretario,$sexo_secretario,$vocal,$dni_vocal,$tipo_dni_vocal,$sexo_vocal){
        
        $bool=true;
        $count=0;
        $archivo=fopen("../Archivos/Listas/id.txt","r")or die("error");
        while(!feof($archivo)){
            $fila=fgets($archivo);
            $datos=explode("\t",$fila);
            $count=$datos[0]+1;
    
        }
     fclose($archivo);
     $archivo=fopen("../Archivos/Listas/id.txt","w+")or die("error");
        while(!feof($archivo)){
            $fila=fgets($archivo);
            $datos=explode("\t",$fila);
            fputs($archivo,$count);
        break;
    
        }
     fclose($archivo);
        $archivo=fopen("../Archivos/Listas/Listado.csv","r");{
            while(!feof($archivo)){
                $linea=fgets($archivo);
                $datos=explode("|",$linea);
                $id=$datos[0];
                $nom=$datos[1];
                $pre=$datos[2];
                $vic=$datos[3];
                $sec=$datos[4];
                $voc=$datos[5];
                if($nom==$nombre){
                    echo "esta lista ya se encuentra registrada";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error3.php");
                    break;
                }
                if($pre==$presidente){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($vic==$presidente){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($sec==$presidente){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($voc==$presidente){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($pre==$vicepresidente){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($sec==$vicepresidente){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($voc==$vicepresidente){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($pre==$secretario){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($vic==$secretario){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($sec==$secretario){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($voc==$secretario){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($pre==$vocal){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($vic==$vocal){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($sec==$vocal){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
                elseif($voc==$vocal){
                    echo "Esta lista no puede estar conformada por integrantes de otras listas";
                    $bool=false;
                    header("Location:../Errores/Adminlistas/Error4.php");
                    break;
                }
        }

        }
        fclose($archivo);
        if($bool){
            insertar($count,$nombre,$presidente,$dni_presidente,$tipo_dni_presidente,$sexo_presidente,$vicepresidente,$dni_vicepresidente,$tipo_dni_vicepresidente,$sexo_vicepresidente,$secretario,$dni_secretario,$tipo_dni_secretario,$sexo_secretario,$vocal,$dni_vocal,$tipo_dni_vocal,$sexo_vocal);
        }
              
    }
    function insertar($count,$nombre,$presidente,$dni_presidente,$tipo_dni_presidente,$sexo_presidente,$vicepresidente,$dni_vicepresidente,$tipo_dni_vicepresidente,$sexo_vicepresidente,$secretario,$dni_secretario,$tipo_dni_secretario,$sexo_secretario,$vocal,$dni_vocal,$tipo_dni_vocal,$sexo_vocal){
        $res=verificar();
        if($res==1){
            header("Location:../Errores/Adminlistas/Error5.php");
            exit;
        }
        $archivo=fopen("../Archivos/Listas/Listado.csv","a+");
        while(!feof($archivo)){
            $linea=fgets($archivo);
            $datos=explode("|",$linea);
            //Nombre de la lista
            $id=$datos[0];
            $nom=$datos[1];
            //Presidente
            $pre=$datos[2];
            $dni_pre=$datos[3];
            $tipo_dni_pre=$datos[4];
            $sexo_pre=$datos[5];
            //Vicepresidente
            $vic=$datos[6];
            $dni_vic=$datos[7];
            $tipo_dni_vic=$datos[8];
            $sexo_vic=$datos[9];
            //Secretario
            $sec=$datos[10];
            $dni_sec=$datos[11];
            $tipo_dni_sec=$datos[12];
            $sexo_sec=$datos[13];
            //Vocal
            $voc=$datos[14];
            $dni_voc=$datos[15];
            $tipo_dni_voc=$datos[16];
            $sexo_voc=$datos[17];
           $array=$count.'|'.$nombre.'|'.$presidente.'|'.$dni_presidente.'|'.$tipo_dni_presidente.'|'.$sexo_presidente.'|'.$vicepresidente.'|'.$dni_vicepresidente.'|'.$tipo_dni_vicepresidente.'|'.$sexo_vicepresidente.'|'.$secretario.'|'.$dni_secretario.'|'.$tipo_dni_secretario.'|'.$sexo_secretario.'|'.$vocal.'|'.$dni_vocal.'|'.$tipo_dni_vocal.'|'.$sexo_vocal."\n";
           fputs($archivo,$array);
        break;
        }
        fclose($archivo);
        $archivo=fopen("../Archivos/Listas/Listadovista.csv","a");
        while(!feof($archivo)){
            $linea=fgets($archivo);
            $datos=explode("\t",$linea);
            $id=$datos[0];
            $nom=$datos[1];
            $pre=$datos[2];
            $vic=$datos[3];
            $sec=$datos[4];
            $voc=$datos[5];
           $array=$count."\t".$nombre."\t".$presidente."\t".$vicepresidente."\t".$secretario."\t".$vocal."\n";
           fputs($archivo,$array);
        break;
        }
        fclose($archivo);
        $archivo=fopen("../Archivos/Resultados/Lista$count.txt","w");
        while(!feof($archivo)){
            fputs($archivo,"0");
        break;
        }
        fclose($archivo);
        header("Location:../Alertas/Alerta3.php");
        
    }
    function verificar(){
            $cont=0;
            $ruta="../Archivos/Listas/Listado.csv";    
            $archivo1=fopen($ruta,'r') or die("errror");
            while($campos=fgetcsv($archivo1,999)){
                $cont++;
                echo $cont;
            }
            if($cont==4){
                echo "Las listas ya estan llena";
                return 1;
                
            }
            

        
    }
?>