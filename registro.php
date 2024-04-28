<?php 
 
if(isset($_GET['registrado'])){
  $mensage="<h3 id='alerta'>¡¡¡ USUARIO REGISTRADO !!!</h3>";
}else{
  $mensage='';
}
?>
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
    <?php
     echo $mensage;
    ?>
    <form id="formulario" action="respuestareg.php"  method="POST" enctype="multipart/form-data" >
        <label>Foto de perfil:</label><input type="file" name="fotousu" id="fotousu"  class="circle" >
        <label >Usuario:<input type="text" name="usuarioreg" id="usuarioreg" ></label>
        <label>Contraseña:<input type="password" name="contrasena1" id="contrasena1" ></label><span id = "message"></span>
        <label>Repetir Contraseña:<input type="password" name="contrasena2" id="contrasena2"></label><span id = "msg"> </span>
        <label>Dirección de email:<input type="text" name="email" id="email" ></label>
        <label>Sexo:</label><select name="sexo" id="sexo">
            <option value="1">Mujer</option>
            <option value="2">Hombre</option>
            <option value="0">Otro</option>
        </select>
        <span id = "container"></span>
        <label>Fecha de nacimiento:<input type="date" max="2004-11-04" name="nacimiento" id="nacimiento"></label>
        <label>Ciudad:<input type="text" name="ciudad" id="ciudad" ></label>
        <label>Pais:</label>
        <select name="pais">
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

        <input type="submit" id="entrar"  value="Registrarse" class="peticioninput">
    </form>
</main>
<?php

include "php/footer.php";
?>
</body>

</html>