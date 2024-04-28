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

    $sql ="SELECT * from fotos";
    $qwey = mysqli_query($conec,$sql);
    

    $tit = $_POST['titulo'];
    $fech1=$_POST['fecha1'];
    $fech2=$_POST['fecha2'];
    $pais=$_POST['pais'];
    
    while($row = mysqli_fetch_array($qwey)){
    
      if($tit==$row['titulo'] && $row['fecha'] > $fech1 && $pais=$row['pais']){
         
         ?>
          <figure>
          <a href="infofoto.php?<?php echo 'id='.$row['idfoto']?>" ><img src="img/<?php echo $row['fichero']?>" alt="foto"></a>
          <figcaption><?php echo $row['titulo'];?></figcaption>
          <figcaption><?php echo $row['fecha'];?></figcaption>
          <figcaption><?php echo $row['pais'];?></figcaption>
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