<?php
session_start();
$id_lista=$_POST['id_lista'];
$id_user=$_POST['id_user'];
$dni=$_POST['dni'];
echo $id_user;
echo "<br>";
echo $id_lista;
echo "<br>";
echo $dni;
$archivo=fopen("../Archivos/Votos/Votos.txt","a+");
while(!feof($archivo)){
    fputs($archivo,$id_user.'|'.$dni.'|'.$id_lista."\n");
break;
}
fclose($archivo);
$archivo=fopen("../Archivos/Resultados/Lista$id_lista.txt","r")or die("error");
$cont=0;
while(!feof($archivo)){
    $linea=fgets($archivo);
    $datos=explode("|",$linea);
    if(strlen($linea)>0){
        $cont=$datos[0]+1;
    break;
    }
}
fclose($archivo);
$archivo=fopen("../Archivos/Resultados/Lista$id_lista.txt","w+")or die("error");
while(!feof($archivo)){
    fputs($archivo,$cont);
break;
}
fclose($archivo);
$_SESSION['usuario']['estado']=1;
header("Location:../Alertas/Alerta2.php?id=$id_lista");













//Revisar como sigue
//include("../Funciones/Resultados.php");
//
//    if(isset($_POST['Lista_A'])){
//        session_start();
//        $nombre=$_SESSION['usuario']['nombre'];
//        $dni=$_SESSION['usuario']['dni'];
//        $correo=$_SESSION['usuario']['email'];
//        lista_A($nombre,$dni,$correo);
//        $valor=$_POST['Lista_A'];
//        $_SESSION['usuario']['voto']=$valor;    
//        $_SESSION['usuario']['estado']=1;
//        header("Location:../Alertas/Alerta2.php");
//        //unset($_SESSION['usuario']);
//        echo $valor;
//        exit;
//    }
//elseif(isset($_POST['Lista_B'])){
//    session_start();
//    $nombre=$_SESSION['usuario']['nombre'];
//    $dni=$_SESSION['usuario']['dni'];
//    $correo=$_SESSION['usuario']['email'];
//    lista_B($nombre,$dni,$correo);
//    $valor=$_POST['Lista_B'];
//    $_SESSION['usuario']['estado']=1;
//    $_SESSION['usuario']['voto']=$valor;
//    header("Location:../Alertas/Alerta2.php");
//    //unset($_SESSION['usuario']);
//    echo $valor;
//    exit;
//}
//elseif(isset($_POST['Lista_C'])){
//    session_start();
//    $nombre=$_SESSION['usuario']['nombre'];
//    $dni=$_SESSION['usuario']['dni'];
//    $correo=$_SESSION['usuario']['email'];
//    lista_C($nombre,$dni,$correo);
//    $valor=$_POST['Lista_C'];
//    $_SESSION['usuario']['estado']=1;
//    $_SESSION['usuario']['voto']=$valor;
//    header("Location:../Alertas/Alerta2.php");
//    //unset($_SESSION['usuario']);
//    echo $valor;
//    exit;
//}    
//elseif(isset($_POST['Lista_D'])){
//    session_start();
//    $nombre=$_SESSION['usuario']['nombre'];
//    $dni=$_SESSION['usuario']['dni'];
//    $correo=$_SESSION['usuario']['email'];
//    lista_D($nombre,$dni,$correo);
//    $valor=$_POST['Lista_D'];
//    $_SESSION['usuario']['estado']=1;
//    $_SESSION['usuario']['voto']=$valor;
//
//    header("Location:../Alertas/Alerta2.php");
//    //unset($_SESSION['usuario']);
//    echo $valor;
//    exit;
//}
?>