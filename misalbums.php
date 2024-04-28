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
        
        if( $_SESSION['Centinelausuario'] == 0 ){
            echo '<p class="error">Error, para poder ver el perfil tienes que <a href="registro.php"
            target="_blank">Registrarse</a> o <a href="login.php"
            target="_blank">Iniciar Sesión</a>';
        }
        if($_SESSION['Centinelausuario'] == 1){
          $usu=$_SESSION['usuario'];
          $img2=$_SESSION['fotousu'];
            ?>
            <section class="perfil">
            <img src="<?php echo './'.$usu.'/'. $img2;?>" alt="perfil" width="250" height="250">
            <article>
              <?php
            if($_SESSION['hora']>=$_SESSION['hora1'] && $_SESSION['hora']<=$_SESSION['hora2']){
              echo '<h3>Buenos días '.$_SESSION['usuario'].'</h3>';
            }else if($_SESSION['hora']>=$_SESSION['hora3'] && $_SESSION['hora']<=$_SESSION['hora4']){
              echo '<h3>Hola '.$_SESSION['usuario'].'</h3>';

            }else if($_SESSION['hora']>=$_SESSION['hora5'] && $_SESSION['hora']<=$_SESSION['hora6']){
              echo '<h3>Buenas tardes '.$_SESSION['usuario'].'</h3>';

            }else if($_SESSION['hora']>=$_SESSION['hora7'] && $_SESSION['hora']<=$_SESSION['hora8']){
              echo '<h3>Buenas noches '.$_SESSION['usuario'].'</h3>';
            }
        }
        ?>
                <h4>Tus albums:</h4>

<?php
    $usu =$_SESSION['usuario'];
    $conec =conexion();
    $sql ="SELECT titulo,descripcion,usuario from albumes";
    $qwey = mysqli_query($conec,$sql);
   
    while($row = mysqli_fetch_array($qwey)){ //Solo coge el de id = 2 de los albums WTF
      if($usu ==$row['usuario'] ){
?>

        <p>Titulo:<a href="./veralbum.php"><?php echo $row['titulo'];?></a></p>
        <p>Descripción: <?php echo $row['descripcion'];?></p>
        <br>
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