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
      <div class="gallery">

    <?php
    $usu =$_SESSION['usuario'];
    $sql ="SELECT fotos.titulo as tfot, albumes.titulo as talb,fecha,pais,fichero,fotos.album as ftalb, albumes.idalbum as idalb, idfoto, usuario  from fotos, albumes where usuario='$usu' ";
    //$sql ="SELECT titulo,fecha,pais,fichero,usuario from fotos,albumes"; ???????????
    $qwey = mysqli_query($conec,$sql);
    


    
    while($row = mysqli_fetch_array($qwey)){
         if($row['idalb'] == $row['ftalb']){
         ?>
          <figure>
          <a href="infofoto.php?<?php echo 'id='.$row['idfoto']?>" ><img src="img/<?php echo $row['fichero']?>" alt="foto"></a>
          <figcaption><?php echo $row['tfot'];?></figcaption>
          <figcaption><?php echo $row['fecha'];?></figcaption>
          <figcaption><?php echo $row['pais'];?></figcaption>
          <figcaption><?php echo $row['talb'];?></figcaption>

      </figure>
      <?php

         }
      
    }
    ?>      
          </div>
          </main>
          
<?php

    include "php/footer.php";
?>

</body>

</html>