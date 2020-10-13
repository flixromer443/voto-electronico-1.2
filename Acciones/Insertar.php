<?php
    include("../Funciones/Rellenar.php");
    if(isset($_POST['insertar'])){
        $nombre=$_POST['nombre'];
        $dni=$_POST['dni'];
        $tipo_dni=$_POST['tipo_dni'];
        $sexo=$_POST['sexo'];
        $email=$_POST['email'];
        if(empty($nombre)&&empty($dni)){
            header("Location:../Errores/Admin/Error3.php");
            exit;
        }
        if(empty($nombre)){
            header("Location:../Errores/Admin/Error1.php");
            exit;
        }
        elseif(strlen($dni)!=8){
            header("Location:../Errores/Admin/Error2.php");
            exit;
        }
        elseif(empty($email)){
            header("Location:../Errores/Admin/Error4.php");
            exit;
        }
        else{
            $res=verificar($dni,$tipo_dni,$email);
            if($res==2){
                header("Location:../Errores/Admin/Error8.php");
                exit;
            }
            if($res==1){
                echo "usted se encuentra registrado";
                header("Location:../Errores/Admin/Error5.php");
                exit;
            }
            echo "Funciona";
            agregar($nombre,$dni,$tipo_dni,$sexo,$email);
            header("Location:../Alertas/Alerta1.php");
        }

    }
    echo "inserta";
?>