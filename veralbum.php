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
    $sql ="SELECT fotos.titulo as tfot, albumes.titulo as talb,fecha,pais,fichero,fotos.album as ftalb, albumes.descripcion as albdesc, albumes.idalbum as idalb from fotos, albumes";
    $qwey = mysqli_query($conec,$sql);
    $iter=0;
    while($row2 = mysqli_fetch_array($qwey)){
        if($row2['idalb']== $row2['ftalb'] && $row2['ftalb'] == 1 ){
            $iter=$iter+1;
            $desc=$row2['albdesc'];


            

    }
      
}
  
    ?>
             <p>Total de fotos: <?php echo $iter; ?> </p>
             <p>Descripción: <?php echo $desc;?> </p>



             <div class="gallery">


             <?php




    $usu2 =$_SESSION['usuario'];
    $sql2 ="SELECT fotos.titulo as tfot, albumes.titulo as talb,fecha,pais,fichero,fotos.album as ftalb, albumes.idalbum as idalb from fotos, albumes";
    $qwey2 = mysqli_query($conec,$sql2);

    while($row = mysqli_fetch_array($qwey2)){
         if($row['idalb']== $row['ftalb'] && $row['ftalb'] == 1 ){
         ?>

          <figure>
          <a href="infofoto.php"><img src="img/<?php echo $row['fichero']?>" alt="foto"></a>
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