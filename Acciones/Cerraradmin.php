<?php 
if(isset($_POST["Cerrar_sesion"])){
    session_start();
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
        header("Location:../Index.php");

    }
    elseif(isset($_SESSION['adminlistas']))
    {
        unset($_SESSION['adminlistas']);
        header("Location:../Index.php");
        header("Location:../Index.php");

    }
   
}
?>