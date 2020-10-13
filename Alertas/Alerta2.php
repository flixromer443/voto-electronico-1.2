<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location:../Index.php");
}
$id_lista=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Estilos/Estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cabecera">
        <h1>Votemos</h1>
    </div>
    <div class="container">
        <form  class="formulario" action="../Acciones/Correo.php" method="POST">
        <h1>Usted ha finalizado</h1>
        <h2>Gracias por votar!!</h2>
        <br><br>
            <input type="hidden" name="id_lista" value="<?php echo $id_lista;?>">
            <input type="submit" name="finalizar" value="Finalizar">
        </form>
    </div>
    <div class="container">
        <footer class="pie">
            <h2>Developed by Felix-2020®</h2>
        </footer>
    </div>
   
</body>
</html>