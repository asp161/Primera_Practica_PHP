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
     $sql ="SELECT foto from usuarios where nomusuario = '$usu'";
     $qwey = mysqli_query($conec,$sql);
     $row = mysqli_fetch_array($qwey);
  
     if($row['foto'] == ''){
      $fot="usu";
     }else{
      $fot=$row['foto'];
     }
        
        if( $_SESSION['Centinelausuario'] == 0 ){
            echo '<p class="error">Error, para poder ver el perfil tienes que <a href="registro.php"
            target="_blank">Registrarse</a> o <a href="login.php"
            target="_blank">Iniciar Sesión</a>';
        }
        if($_SESSION['Centinelausuario'] == 1){
            ?><section class="perfil">


              <?php
                 if(empty($row['foto'])){
                  ?>
                  <img src="./img/usu.png" alt="perfil" width="250"  height="250" class="imgusu">
                  <?php 
                }else{
                 ?>
                 
               
               <img src="./<?php echo $usu?>/<?php echo $row['foto']?>" alt="perfil" width="250"  height="250" style="border-radius: 50%">
             
                
                
            
              <?php 
                }
              
            ?>
            
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
            echo'
                <a href="misdatos.php">Editar Datos Personales</a>
                <a href="configuracion.php">Editar Estilo</a>
                <a href="darsebaja.php">Darse de Baja</a>
                <a href="misfotos.php">Todas mis fotos</a>
                <a href="misalbums.php">Visualizar Albums</a>
                <a href="crearalbum.php">Crear Nuevo Album</a>
                <a href="solicitaalbum.php">Solicitar Album Impreso</a>
                <a href="logout.php">Salir</a>
            </article>
        </section>';
        }
        ?>
    </main>
    <?php
    include "php/footer.php";
    ?>
</body>

</html>