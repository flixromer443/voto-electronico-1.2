<?php
include("../Funciones/Ingreso.php");

if(isset($_POST['ingresar'])){
    $dni=$_POST['dni'];
    if($dni==="1234"){
        session_start();
        $_SESSION['admin']['estado']=1;
        header("Location:../Interfaces/Administrador.php");
        exit;
    }
    elseif($dni==="12345"){
        session_start();
        $_SESSION['adminlistas']['estado']=1;
        header("Location:../Interfaces/Adminlistas.php");
        exit;
    }
    elseif(empty($dni)){
        header("Location:../Errores/User/Error1.php");
        exit;
    }
    elseif(strlen($dni)!==8){
        header("Location:../Errores/User/Error2.php");
        exit;
    }
    else{

        $cont=0;
        $archivo=fopen('../Archivos/Listas/Listado.csv','r');
        while(!feof($archivo)){
            $linea=fgets($archivo);
            
            $cont+=strlen($linea);

        }
        fclose($archivo);
        if($cont==0){
            header("Location:../Alertas/Alerta4.php");
        }
        elseif($cont>1){
            $res=validar($dni);
            if($res==1){
                header("Location:../Errores/User/Error3.php");
                exit;
            }
            validar2($dni);
            exit;
        }
       
    }

}



?>