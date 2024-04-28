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
    <form method="post" id="formulario" action="resfotoadd.php">
        <label >Título: <input type="text" name="titulo" id="titulo" required ></label>
        <label>Descripción: <input type="text" name="desc" id="desc" ></label>
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
        <label>Foto: <input type="text" name="foto" id="foto" ></label>
        <label >Texto alternativo: <input min="10" type="text" name="textalt" id="textalt" ></label>

        <br><label for="albumes">Álbum: <select name="albumes" id="albumes" class="form-control" >           
                <?php
                    $usu =$_SESSION['usuario'];
                    $sql = "SELECT * FROM albumes where usuario = '$usu'";
                $qwey = mysqli_query($conec,$sql);
                while($row = mysqli_fetch_array($qwey)){
                $idalbum = $row['idalbum'];
                $nomalbu = $row['titulo'];
                ?>
                <option value="<?php echo $idalbum ?>"><?php echo $nomalbu ?></option>
              <?php
              }
              ?>
            
            </select></label>
        
        

        <input type="submit" id="entrar"  value="Subir Foto" class="peticioninput">
    </form>

    </main>
    <?php
    include "php/footer.php";
    ?>
</body>

</html>