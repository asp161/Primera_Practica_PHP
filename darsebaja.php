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
<h4>Tus albums:</h4>

<?php
    $usu =$_SESSION['usuario'];
    $sql ="SELECT titulo,descripcion,usuario,idalbum from albumes";
    $qwey = mysqli_query($conec,$sql);

    $sql3 ="SELECT * from usuarios where nomusuario = '$usu'";
    $qwey3 = mysqli_query($conec,$sql3);
    $filaclave = mysqli_fetch_row($qwey3);
    $clavesql = $filaclave[2];
    $sql4 = "DELETE FROM usuarios WHERE nomusuario = '$usu'";
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

        <p>Titulo:<?php echo $row['titulo'];?></p>
        <p>Numero de fotos: <?php echo $row2['ff'];?></p>
        <?php
    
        $arrayaux[$i] = $row['idalbum'];
        $i++;
        
        $total = $total + $row2['ff'];
        ?>
        
        <br>
<?php
      }
    }
  

    ?>
    <p>Total de fotos: <?php echo $total?> </p>

<form id="formul" method="post" action="">
<label>Contraseña:<input type="password" name="aa" id="aa"></label>
<input type="submit" value="Darse de Baja" class="peticioninput">
</form>

<?php
if(isset($_POST['aa'])){

    $contr1 = $_POST['aa'];
    if($contr1 == $clavesql ){
        $sql6= "SET FOREIGN_KEY_CHECKS=0";
        $qwey6=mysqli_query($conec,$sql6);
        
        $sql4 ="DELETE FROM usuarios WHERE nomusuario = '$usu'";
        $qwey4= mysqli_query($conec,$sql4);

        
        $j=0;
        

        while($j < sizeof($arrayaux)){
            mysqli_query($conec,"DELETE FROM fotos WHERE fotos.album = '$arrayaux[$j]'");
            $j++;
        }
        
        $sql5 ="DELETE FROM albumes WHERE  usuario = '$usu'";
        $qwey5= mysqli_query($conec,$sql5);

        $sql7= "SET FOREIGN_KEY_CHECKS=1";
        $qwey7=mysqli_query($conec,$sql7);

        $usu2=$_SESSION['usuario'];
        $img2=$_SESSION['fotousu'];

        $auxaux= $usu2;
        
        function eliminar_directorio($dir){
            $result = false;
            if ($handle = opendir($dir)){
            $result = true;
            while ((($file=readdir($handle))!==false) && ($result)){
            if ($file!='.' && $file!='..'){
            if (is_dir("$dir/$file")){
            $result = eliminar_directorio("$dir/$file");
            } else {
            $result = unlink("$dir/$file");}}}
            closedir($handle);
            if ($result){
            $result = rmdir($dir);
            }}
            return $result;
            }
        
           eliminar_directorio($auxaux);

       header('Location:index.php');
       echo'Se borra';
       include "logout.php";
        
    }else{
        echo 'Las contraseñas no coinciden';
    }
    
}
?>



    </main>
<?php

    include "php/footer.php";
?>

</body>
</html>