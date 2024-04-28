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

        <!-- Es un ejemplo de una imagen, mas adelante lo añadería ese trozo de codigo dependiendo de la imagen con js-->

       

        <?php
       
        $id=$_GET['id'] ;
        
        if( $_SESSION['Centinelausuario'] == 0 ){
            echo '<p class="error">Error, para poder ver el detalle de la foto tienes que <a href="registro.php"
            target="_blank">Registrarse</a> o <a href="login.php"
            target="_blank">Iniciar Sesión</a>';
        }
        if($_SESSION['Centinelausuario'] == 1){
        

    ?>


    <?php

    $sql ="SELECT idfoto, titulo, fecha, pais, fichero, idPais, nomPais,album,descripcion from fotos, paises where pais=idPais AND $id =idfoto";
    $qwey = mysqli_query($conec,$sql);
      
     
    while($row = mysqli_fetch_array($qwey)){

        
         ?>

<div class="infofoto">
            <div>
            <img src="img/<?php echo $row['fichero']?>" alt="foto" width="500px" height="700px">
            </div>
            <div class="infofoto_texto">
                
                <h3 class="titulo_foto"><?php echo $row['titulo'];?></h3>
                <p class="descripcion_foto"><?php echo $row['fecha'];?></p>
                <p class="descripcion_foto"><?php echo $row['nomPais'];?></p>
                <p class="descripcion_foto"><?php echo $row['descripcion'];?></p>
                <p class="descripcion_foto"><a href ="veralbum.php"><?php echo $row['album'];?></a></p>
                <p class="descripcion_foto"><a href ="perfilusuario.php">Magdalena</a></p>
            </div>
        </div>

      <?php
        
      
    }
        }
    
    ?> 

</main>

    <?php 
    include "php/footer.php";
  ?>
</body>

</html>