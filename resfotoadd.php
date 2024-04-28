
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

<main>

    <?php
   
    include "php/estiloseleccion.php";
     




    $titulo = $_POST['titulo'];
    $desc = $_POST['desc'];
    $pais = $_POST['pais'];
    $foto = $_POST['foto'];
    $textalt = $_POST['textalt'];
    $albumes = $_POST['albumes'];
    $fechaact = date( "Y-m-d H:i");
    $fechaact2 = date( "Y-m-d");


  
   
    
    $aErrores = array();
    $aMensajes = array();
  
        
       echo "FORMULARIO RECIBIDO:<br/>";
       echo "====================<p/>";
 
       // Comprobar si llegaron los campos requeridos:
      
       
        
            if( empty($titulo) ){
               $aErrores[] = "Debe especificar el nombrtitulo";
            }else if(strlen($textalt)< 11){
                    $aErrores[] = "la descripcion tiene que ser minimo de 10 caracteres";
                }
              

       
    
        if( count($aErrores) > 0 )
       {
           echo "<p>ERRORES ENCONTRADOS:</p>";
           for( $contador=0; $contador < count($aErrores); $contador++ )
               echo $aErrores[$contador]."<br/>";
       }
       else if(count($aErrores)==0){
        $sql="INSERT INTO fotos(titulo,descripcion,pais,album,fichero,alternativo,fregistro,fecha) VALUES ('$titulo','$desc','$pais','$albumes','$foto','$textalt', '$fechaact', '$fechaact2')";
        $query=mysqli_query($conec,$sql);
       }
?>
       <a href="index.php" class="peticioninput"> Volver al Inicio </a>
<?php

include "php/footer.php";





?>
</main>
</body>

</html>