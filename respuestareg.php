
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
     




    $usuario = $_POST['usuarioreg'];
    $pass = $_POST['contrasena1'];
    $pass2 = $_POST['contrasena2'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $fnacimiento = $_POST['nacimiento'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $fechaact = date( "Y-m-d H:i");
    

        
   
    
   
    
    $aErrores = array();
    $aMensajes = array();
  
   
       echo "FORMULARIO RECIBIDO:<br/>";
       echo "====================<p/>";
 
       // Comprobar si llegaron los campos requeridos:
      
       
        
            if( empty($usuario) ){
               $aErrores[] = "Debe especificar el nombre";
            }else{
                if(strlen($usuario)< 3 || strlen($usuario)>15){
                    $aErrores[] = "el nombre de usuario tiene que ser entre 3 y 15 caracteres";
                }
                $aMensajes[] = "Usuario: " . $_POST["usuarioreg"];
            }
            if( empty($pass) ){
                $aErrores[] = "Debe especificar la contraseña";
                }else if(strlen($usuario)< 3 || strlen($usuario)>15){
                    $aErrores[] = "el nombre de usuario tiene que ser entre 3 y 15 caracteres";
                }
                
            if( empty($pass2) ){
                $aErrores[] = "Las contraseñas no son correctas";
                }else if(strlen($pass)<6 || strlen($pass)>15){
                    $aErrores[] = "la contraseña debe ser de entre 6 y 15 caracteres";
                }
            if( $pass != $pass2 ){
                $aErrores[] = "Las contraseñas no iguales";
            }else{
                $aMensajes[] = "contraseña correcta";
            }
            if( empty($email) ){
                $aErrores[] = "Debe especificar un email";
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $aErrores[] = "El correo es incorrecto";
            }
            if(strlen($usuario)>255){
                $aErrores[] = "el email tiene que tener máximo 255 caracteres";
            }
            if(!preg_match("/^[a-zA-Z]/",$pass)){
                $aErrores[] = "La contraseña es incorrecta";
            }
            if(!preg_match("/[0-9]+/",$pass)){
                $aErrores[] = "La contraseña es incorrecta";
            }
            if(!preg_match("/^[a-zA-Z]/",$usuario)){
                $aErrores[] = "El usuario es incorrecto";
            }
          /*  if(!preg_match("/\b[A-Za-z0-9._%+-]{2,64}+@[A-Za-z0-9.-]{2,255}+\.[A-Za-z0-9-]{2,63}\b/",$email)){
                $aErrores[] = "El correo es incorrecto";
            }
            */
            if( empty($ciudad) ){
                $aErrores[] = "Debe especificar una ciudad";
            }
            

        
       
    
       // Si han habido errores se muestran, sino se mostrán los mensajes
        if( count($aErrores) > 0 )
       {
           echo "<p>ERRORES ENCONTRADOS:</p>";
           // Mostrar los errores:
           for( $contador=0; $contador < count($aErrores); $contador++ )
               echo $aErrores[$contador]."<br/>";
       }
       else
       {
           // Mostrar los mensajes:
           for( $contador=0; $contador < count($aMensajes); $contador++ )
               echo $aMensajes[$contador]."<br/>";
       }

       

       
        
    $foto = $_FILES['fotousu'];
    $tmpname=$_FILES['fotousu']['tmp_name'];
    $img = $_FILES['fotousu'] ['name'];
    $tipo = $_FILES['fotousu']['type'];
   
    
if(strpos($tipo,"jpeg") || strpos($tipo, "png") || strpos($tipo,"jpg")){
    $destino= $usuario.'/'. $img;
    $_SESSION['usuario']= $usuario;
    $_SESSION['fotousu']= $img;

       if(count($aErrores)==0){
       
        $sql="INSERT INTO usuarios(nomusuario,clave,email,sexo,fnacimiento,ciudad,pais,estilo,foto,fregistro) VALUES ('$usuario','$pass','$email','$sexo','$fnacimiento','$ciudad',$pais,'6','$img','$fechaact')";
        $query=mysqli_query($conec,$sql);

        $micarpeta = $usuario;
        if (!file_exists($micarpeta)) {
            mkdir($micarpeta, 0777, true);
        }

       }
       if(is_uploaded_file($tmpname)){
        copy($tmpname,$destino);
       }
    }
    
  
if(isset($img)){

    ?>
    <img src="<?php echo './'.$usuario.'/'. $img;?>" alt="perfil" width="250"  height="250" style="border-radius: 50%">
    <?php
}
   if(count($aErrores)!=0){
    echo "<p><a href='registro.php'>Haz clic aquí para volver al formulario</a></p>";

   }else{
    echo "<p><a href='index.php'>Haz clic aquí para volver al inicio</a></p>";

   }





include "php/footer.php";





?>
</body>

</html>