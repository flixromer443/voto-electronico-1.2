<?php 
if(isset($_POST['finalizar'])){
    session_start();
    unset($_SESSION['usuario']);
    echo "Finalizar";
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    echo date("d-m-y h:a");
}
?>