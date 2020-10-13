<?php
include("../Funciones/Listas.php");
if(isset($_POST['generar'])){
    //Nombre de la lista
    $nombre=$_POST['nombre'];

    //Presidente
    $presidente=$_POST['presidente'];
    $dni_presidente=$_POST['dni_presidente'];
    $tipo_dni_presidente=$_POST['tipo_dni_presidente'];
    $sexo_presidente=$_POST['sexo_presidente'];
    //echo $presidente.$dni_presidente.$tipo_dni_presidente.$sexo_presidente;
    //echo "<br>";

    //Vicepresidente
    $vicepresidente=$_POST['vicepresidente'];
    $dni_vicepresidente=$_POST['dni_vicepresidente'];
    $tipo_dni_vicepresidente=$_POST['tipo_dni_vicepresidente'];
    $sexo_vicepresidente=$_POST['sexo_vicepresidente'];
   // echo $vicepresidente.$dni_vicepresidente.$tipo_dni_vicepresidente.$sexo_vicepresidente;
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
    echo $vocal.$dni_vocal.$tipo_dni_vocal.$sexo_vocal;

    if(empty($nombre)){
        header("Location:../Errores/Adminlistas/Error1.php");
        exit;
    }
    elseif(empty($presidente)){
        header("Location:../Errores/Adminlistas/Error2.php");
        exit;
    }
    elseif(empty($vicepresidente)){
        header("Location:../Errores/Adminlistas/Error2.php");
        exit;
    }
    elseif(empty($secretario)){
        header("Location:../Errores/Adminlistas/Error2.php");
        exit;
    }
    elseif(empty($vocal)){
        header("Location:../Errores/Adminlistas/Error2.php");
        exit;
    }
    
    //Continuar luego
    generar($nombre,$presidente,$dni_presidente,$tipo_dni_presidente,$sexo_presidente,$vicepresidente,$dni_vicepresidente,$tipo_dni_vicepresidente,$sexo_vicepresidente,$secretario,$dni_secretario,$tipo_dni_secretario,$sexo_secretario,$vocal,$dni_vocal,$tipo_dni_vocal,$sexo_vocal);

}
    
?>