<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alvaro Sánchez Pinedo e Irene Onsurbe">
    <meta name="description" content="Practica1PCW">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="formulario.js"></script>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>DAW</title>
</head>

<body>



<?php
    include "php/estiloseleccion.php";
    ?>

<main>
<form method="post" id="formulario">
        <select name="Estilo" id="Estilo">
            <option value="1">Modo Oscuro</option>
            <option value="2">Bajo Contraste</option>
            <option value="3">Letra Grande</option>
            <option value="4">Bajo Contraste y Letra Grande</option>
            <option value="6">Normal</option>
        </select>

        <input type="submit" id="entrar"  value="Aceptar" class="peticioninput">
    </form>



    <?php
    $usu =$_SESSION['usuario'];
    if(isset($_POST['Estilo'])){

    $SALIDA = $_POST['Estilo'];
    $sql ="UPDATE usuarios SET estilo='$SALIDA' where nomusuario='$usu'";
    mysqli_query($conec,$sql);
    header('Location:index.php');

    }
    
    ?>
</main>
<?php

include "php/footer.php";
?>
</body>

</html>