<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Alvaro Sánchez Pinedo e Irene Onsurbe">
    <meta name="description" content="Practica2Daw">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <title>P2</title>
</head>
<body>
 <?php
include "php/estiloseleccion.php";

$usu =$_SESSION['usuario'];
    $sql ="SELECT titulo,descripcion,usuario,idalbum from albumes";
    $qwey = mysqli_query($conec,$sql);

    $sql3 ="SELECT * from usuarios where nomusuario = '$usu'";
    $qwey3 = mysqli_query($conec,$sql3);
    $filaclave = mysqli_fetch_row($qwey3);
    $clavesql = $filaclave[2];
    $arrayaux=[];
    $i=0;

    $total = 0;
   

while($row = mysqli_fetch_array($qwey)){
    $aux = $row['idalbum'];
    $sql2 = "SELECT count(case album when '$aux' then 1 else null end) as ff from fotos ";
    $qwey2 = mysqli_query($conec,$sql2);
    $row2 = mysqli_fetch_array($qwey2);

  if($usu ==$row['usuario'] ){
?>

    <p><a href="./veralbum.php"><?php echo $row['titulo'];?></a></p>
    <p>Descripcion: <?php echo $row['descripcion'];?></p>
    <p>Numero de fotos: <?php echo $row2['ff'];?></p>
    <?php

    $arrayaux[$i] = $row['idalbum'];
    $i++;
    
    ?>
    
<?php
  }
}



$total=0;

    $fotos=$row2['ff'];

    if(isset($_POST['enviar'])) { 
        if($_POST['nombre'] == ''  or $_POST['titulo'] == '' or $_POST['email'] == '' ) { 
            echo 'Por favor llene todos los campos.'; 
        }else{  
                    $nombre = $_POST['nombre'];
                    $titulo = $_POST['titulo'];
                    $texto = $_POST['texto'];
                    $correo = $_POST['email'];
                    $direccion = $_POST['calle'];
                    $resolucion = $_POST['cp2'];
                    $copias= $_POST['copias'];
                    $album = $_POST['albumes'];
                    $color= $_POST['color'];
                    $fecha = $_POST['fecha'];
                    $chk = isset($_POST['colo']);
                    $fechareg = date( "Y-m-d H:i");
                    $fotos = $row2['ff'];
                    $total=0;

                    if($resolucion >=150 && $resolucion <=300 && isset($_POST['colo'])) {
                        $total= $fotos*$copias*2.38;
                        echo "total: " . $total ."€";
                        
                    }else if($resolucion >=150 && $resolucion <=300){
                        $total= $fotos*$copias*0.88;
                        echo "total: " . $total ."€";
                    }
                    
                    if($resolucion >= 450 && $resolucion <= 900 && isset($_POST['colo'])){
                        $total= $fotos*$copias*2.98;
                        echo "total: " . $total ."€";
                    }else if($resolucion >= 450 && $resolucion <= 900){
                        $total= $fotos*$copias*1.48;
                        echo "total: " . $total ."€";
                    }
                   
                    $sql1="INSERT INTO solicitudes(album,nombre,titulo,descripcion,email,direccion,color,copias,resolucion,fecha,icolor,fregistro,coste) VALUES ('$album','$nombre','$titulo','$texto','$correo','$direccion','$color','$copias','$resolucion','$fecha','$chk','$fechareg','$total')";
                    $query=mysqli_query($conec,$sql1);
                    $aMensajes[] = "";
                    $aMensajes[] = "";
                    $aMensajes[] = "nombre: " .$nombre;
                    $aMensajes[] = "titulo: " .$_POST['titulo'];
                    $aMensajes[] = "texto: " .$_POST['texto'];
                    $aMensajes[] = "correo: " .$_POST['email'];
                    $aMensajes[] = "direccion: " .$_POST['calle'];
                  
                    
                
                    for( $contador=0; $contador < count($aMensajes); $contador++ ){
                    echo $aMensajes[$contador]."<br/>";
    
                    echo 'Usted se ha registrado correctamente.'; 
                    header('Location:resalbum.php');
            }  
        } 
    }
    ?>
    <p><a href='index.php'>volver a inicio</p>
        <?php
  

    
    
    
    include "php/footer.php";
?>
    

</body>
</html>
