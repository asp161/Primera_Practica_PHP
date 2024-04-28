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
    $usu =$_SESSION['usuario'];
    if(isset($_POST['enviar'])) { 
        if($_POST['titulo'] == ''  or $_POST['texto'] == '') { 
            echo 'Por favor llene todos los campos.'; 
        } else { 
            
            $sql = 'SELECT * FROM albumes'; 
         
            $rec = mysqli_query($conec,$sql); 
            $verificaralbum = 0; 
            while($result = mysqli_fetch_object($rec)) { 
                if($result->titulo == $_POST['titulo']) { 
                    $verificaralbum = 1; 
                } 
            } 
            if($verificaralbum == 0) { 
                
                    $titulo = $_POST['titulo']; 
                    $desc = $_POST['texto']; 
                    $sql1="INSERT INTO albumes(titulo,descripcion,usuario) VALUES ('$titulo','$desc','$usu')";
                    $query=mysqli_query($conec,$sql1);
    
                    echo 'Usted se ha registrado correctamente.'; 
                    header('Location:addfotoalbum.php');
            } else {
                echo 'Ya tienes un álbum con el mismo nombre.'; 
            } 
        } 
    }
    ?>
<br>
<br>
<br>
<form method="post" id="formulario" action="" >

<label for="titulo">Título del álbum: (*)<input type="text" name="titulo" id="titulo" placeholder="Titulo del álbum" ></label>
<label for="texto">Texto adicional: (*)<textarea name="texto" id="texto" placeholder="descripción" ></textarea></label>
<input type="submit" id="entrar" name= "enviar" class="peticioninput">
</form>


<?php
include "php/footer.php"

?>

</html>