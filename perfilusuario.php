<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alvaro Sánchez Pinedo e Irene Onsurbe">
    <meta name="description" content="Practica1PCW">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>DAW</title>
</head>


<body>

<?php
    include "php/estiloseleccion.php";
    ?>
<main>
<?php
   
    $usu =$_SESSION['usuario'];
    $sql ="SELECT usuarios.nomusuario as usu, albumes.usuario as usualb,foto,fregistro,titulo from albumes,usuarios ";
    $qwey = mysqli_query($conec,$sql);
    $row = mysqli_fetch_array($qwey);
?>

<div class="infofoto"> 
    <div class="infofoto_imagen1">
                <img src="./img/<?php echo $row['foto']?>" width="200px"> </div>
                <div class="infofoto_texto">
                    <h2 class="etiqueta_foto"><?php echo $row['usu']?></h2>
                    <h3 class="titulo_foto">Fecha de incorporación <?php echo $row['fregistro']?></h3>
                    <?php                    
                    while($row = mysqli_fetch_array($qwey)){
                        if($row['usu']==$row['usualb']){//Solo muestra un album
                  ?><p class="descripcion_foto"><?php echo $row['titulo']?> <a href="albumconcreto.php"></a></p>
                  <?php 
                        }
                }
                  ?>
                </div>
                </div>

</main>

<?php

    include "php/footer.php";
?>

</body>

</html>