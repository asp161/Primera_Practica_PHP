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

<?php
   
    $usu =$_SESSION['usuario'];
    $img2 =$_SESSION['fotousu'];

    $sql ="SELECT * from usuarios, paises where nomusuario = '$usu'";
    $qwey = mysqli_query($conec,$sql);
    $row = mysqli_fetch_array($qwey);
    
   
?>

    <main>
        <h2>Mis datos</h2>
        <form method="post" id="formulario" action="datosres.php" enctype="multipart/form-data">
        <?php
                 if(empty($row['foto'])){
                  ?>
                  <img src="./imgusuario/usu.png" alt="perfil" width="250"  height="250" class="imgusu">
                  <?php 
                  
                }else{
                 ?>
                 
               
               <img src="<?php echo './'.$usu.'/'. $img2;?>" alt="perfil" width="250"  height="250" style="border-radius: 50%">
             
                
                
            
              <?php 
                }
              
            ?>
        <label>Foto de perfil:</label>
        <a href="datosres.php<?php echo $row['foto'];?>">
        <span class="glyphicon glyphicon-remove-circle"></span></a>
        <input type="file" name="fotousu" id="fotousu"  class="circle" value="<?php echo $row['foto']?>" >
        <label>Borrar foto<input type= "checkbox" name="borrar"></label>
        <label >Usuario:<input type="text" name="usuarioreg" id="usuarioreg" value="<?php echo $row['nomusuario']?>" ></label>
        <label>Contraseña:<input type="password" name="contrasena1" id="contrasena1"  ></label><span id = "message"></span>
        <label>Repetir Contraseña:<input type="password" name="contrasena2" id="contrasena2"></label><span id = "msg"> </span>
        <label>Dirección de email:<input type="text" name="email" id="email" value="<?php echo $row['email']?>" ></label>
        <label>Sexo:</label><select name="sexo" id="sexo" value="<?php echo $row['sexo']?>">
            <option value="1">Mujer</option>
            <option value="2">Hombre</option>
            <option value="0">Otro</option>
        </select>
        <span id = "container"></span>
        <label>Fecha de nacimiento:<input type="date" max="2004-11-04" name="nacimiento" id="nacimiento" value="<?php echo $row['fnacimiento']?>"></label>
        <label>Ciudad:<input type="text" name="ciudad" id="ciudad" value="<?php echo $row['ciudad']?>"></label>
        <label>Pais:</label>
        <select name="pais" id="pais">
            <?php
         
              $sql = 'SELECT * FROM paises';
              $qwey = mysqli_query($conec,$sql);
              while($row = mysqli_fetch_array($qwey)){
                $idPais = $row['idPais'];
                $nomPais = $row['nomPais'];
                ?>
                <option value="<?php echo $idPais ?>"><?php echo $nomPais ?></option>
              <?php
              }
              ?>
        </select>
        </select>

        <input type="submit" id="entrar"  value="Cambiar datos" class="peticioninput">
    </form>
    </main>


</body>

</html>