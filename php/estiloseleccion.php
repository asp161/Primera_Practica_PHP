<?php
    session_start();
    include ("php/conexion.php"); 
    $conec =conexion();

    if(isset($_SESSION['Centinelausuario'])){

    if($_SESSION['Centinelausuario'] == 0){ include "header.php";
      echo '<link rel="alternative stylesheet" href="./css/estilo.css" type="text/css" title="Standard">';}
      if(isset($_SESSION['usuario'])){
        $a =$_SESSION['usuario'];
      $b ="SELECT estilo from usuarios where nomusuario='$a'";
      $q = mysqli_query($conec,$b);
      $f = mysqli_fetch_row($q);
    }
      
      
      
      if($_SESSION['Centinelausuario'] == 1){include "header2.php";
        if($f[0]== 3){
          echo '<link rel="alternative stylesheet" href="./css/letragrande.css" type="text/css" title="Noche">';
        }
        if($f[0]== 2){
          echo '<link rel="alternative stylesheet" href="./css/bajocontraste.css" type="text/css" title="BajoContraste">';
        }
        if($f[0]== 1){
          echo '<link rel="alternative stylesheet" href="./css/noche.css" type="text/css" title="LetraGrande">';
        }
        if($f[0]== 4){
          echo '<link rel="alternative stylesheet" href="./css/bajocontrasteLetragrande.css" type="text/css" title="BajoContraste+LetraGrande">';
      }else{
        echo '<link rel="alternative stylesheet" href="./css/estilo.css" type="text/css" title="Standard">';
      }
      }
    }else{
      $_SESSION['Centinelausuario']=0;
      echo '<link rel="alternative stylesheet" href="./css/estilo.css" type="text/css" title="Standard">';
      include "header.php";
    }
    
    ?>
