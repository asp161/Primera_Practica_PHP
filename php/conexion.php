<?php
     function conexion(){
        $conexion = mysqli_connect('localhost', 'usudaw', 'usudaw', 'pibd');
       return $conexion;
     }
?>