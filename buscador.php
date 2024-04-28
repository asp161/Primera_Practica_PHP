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
        <form method="post" action="resbuscador.php">

            <label>Titulo:<input type="text" name="titulo" id="titulo"></label>
            <label>Fecha entre:<input type="date" name="fecha1" id="fecha1"></label>
            <label>y:<input type="date" name="fecha2" id="fecha2"></label>
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

            <input type="submit" value="Buscar" class="peticioninput" >
            
            <!--La idea es hacer una funcion en js que haga las dos cosas :D -->
        </form>

    </main>

    <?php

    include "php/footer.php";
    ?>
</body>

</html>