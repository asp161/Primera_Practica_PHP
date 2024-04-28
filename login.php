<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alvaro Sánchez Pinedo e Irene Onsurbe">
    <meta name="description" content="Practica1PCW">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="./js/formulario.js"></script>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>DAW</title>
</head>

<body>


<?php


    include "php/estiloseleccion.php";

    ?>



    <main>
        <?php
         if(isset($_COOKIE['UsuarioCookie'])){
            echo'<form id="formul" method="post" action="controlacceso.php">
            <label for="usuario">Hola '.$_COOKIE["UsuarioCookie"].' su última visita fue '.$_COOKIE["UltvezCookie"].' <input type="hidden" name="usuario" id="usuario" value="'.$_COOKIE["UsuarioCookie"].'"></label>
            <label><input type="hidden" name="contrasena" id="contrasena" value="'.$_COOKIE["ContrasenaCookie"].'"></label>
            <input type="submit" value="Logearse" class="peticioninput">
            <a class="peticioninput" href="logout.php">Salir</a>
        </form>';

         }else{
            echo '        <form id="formul" method="post" action="controlacceso.php">
            <label for="usuario">Usuario:<input type="text" name="usuario" id="usuario"></label>
            <label>Contraseña:<input type="password" name="contrasena" id="contrasena"></label>
            <label><input type="checkbox" id="cbox1" name="cbox1" value="1"> Recuerdame la cuenta</label>
            <input type="submit" value="Logearse" class="peticioninput">
        </form>';
         }

        ?>
    </main>
    <input type = "hidden" name = "topic" value = "something" />
    <?php

    include "php/footer.php";
    ?>
</body>

</html>