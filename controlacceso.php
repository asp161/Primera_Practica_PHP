<?php 
session_start();
// Recibimos los datos del formulario

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$check= $_POST['cbox1'];

include ("php/conexion.php"); 
$conec =conexion();
$sql ="SELECT *from usuarios where nomusuario = '$usuario'";
$qwey = mysqli_query($conec,$sql);
$row = mysqli_fetch_array($qwey);
$_SESSION['fotousu']=$row['foto'];

// Asignamos los valores para permitir el acceso
if(count($row)!=0){
    if($contrasena=$row['clave']){
    echo "Usuario valido"; 
$_SESSION['Centinelausuario'] = 1;
$_SESSION['usuario'] =$usuario;
$ultvez = date('d-m-Y H:i');
$_SESSION['hora'] = date('H:i');
$_SESSION['hora1'] = date('6:00');
$_SESSION['hora2'] = date('11:59');
$_SESSION['hora3'] = date('12:00');
$_SESSION['hora4'] = date('15:59');
$_SESSION['hora5'] = date('16:00');
$_SESSION['hora6'] = date('19:59');
$_SESSION['hora7'] = date('20:00');
$_SESSION['hora8'] = date('5:59');



if (isset($_POST['cbox1']) && $_POST['cbox1'] == '1'){
setcookie("UsuarioCookie", $usuario, time()+(60*60*24*90));
setcookie("ContrasenaCookie", $contrasena, time()+(60*60*24*90));
setcookie("UltvezCookie", $ultvez, time()+(60*60*24*90));
}
header('Location:perfil.php');
} 
else 
{ 
echo "Los datos de acceso no son correctos"; 
header('Location:index.php');
$_SESSION['Centinelausuario'] = 0;
} 
}


// Comparamos los datos recibidos con los permitidos

