<?php

//Validar el ingreso del usuario

function validar($ingreso){

    $archivo=fopen('../Archivos/Padrones/Registro.csv','r');
    while(!feof($archivo)){
            $linea=fgets($archivo);
            $datos=explode("|",$linea);
            $dni=$datos[1];
            if($dni==$ingreso){
                return 1;
            }
    }
}

function validar2($ingreso){
    $state="voto";
    $archivo=fopen('../Archivos/Padrones/Padron.csv','r')or die("error");

                while(!feof($archivo))
                {
                    $linea=fgets($archivo);
                    $datos=explode("|",$linea);
                    $id=$datos[0];
                    $nombre=$datos[1];
                    $dni=$datos[2];
                    $mail=$datos[5];
                   if($ingreso==$dni){
                    date_default_timezone_set("America/Argentina/Buenos_Aires");
                    $fecha=date("d-m-y");
                    $hora=date("h:a");
                        $archivo=fopen('../Archivos/Padrones/Registro.csv','a');
                        fputs($archivo,$id.'|'.$ingreso.'|'.$state."|".$fecha."|".$hora."\n");
                        $archivo2=fopen('../Archivos/Padrones/Registrovista.csv','a');
                        fputs($archivo2,$id."\t".$ingreso."\t".$state."\t".$fecha."\t".$hora."\n");
                            session_start();
                            $_SESSION['usuario']=array();
                            $_SESSION['usuario']['id']=$id;
                            $_SESSION['usuario']['nombre']=$nombre;
                            $_SESSION['usuario']['dni']=$dni;
                            $_SESSION['usuario']['email']=$mail;
                            $_SESSION['usuario']['estado']=0;
                            header("Location:../Interfaces/Usuario.php");
                            return 0;
                        }
                        header("Location:../Errores/User/Error4.php");
                   }
                fclose($archivo);
                
                
    
}


?>