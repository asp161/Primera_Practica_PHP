
<?php 
        $conexion = mysqli_connect('localhost', 'usudaw', 'usudaw', 'pibd');
        $conec2=$conexion;
        $usu2 =$_SESSION['usuario'];
        if(isset($_SESSION['fotousu'])){
            $img2 =$_SESSION['fotousu'];

        }
        $sql2 ="SELECT foto from usuarios where nomusuario = '$usu2'";
        $qwey2 = mysqli_query($conec2,$sql2);
        $row111 = mysqli_fetch_array($qwey2);
     
        if($row111['foto'] == ''){
         $fot2="usu";
        }else{
         $fot2=$row111['foto'];
        }

?>

<header>
    
    <div class="menu">
      <input type="checkbox" id="menu-check">
      <label id="menuham" for="menu-check">
          <span id="menu-abrir">&#9776;</span>
          <span id="menu-cerrar">X</span>
      </label>
        <div class="logo">
            <a href="index.php"> Photoblocks</a>
        </div>
        <nav>
        <ul>
            <li><a href="index.php"> <span class="material-icons">
                        home
                    </span></a></li>
            <li><a href="buscador.php"><span class="material-icons">
                        search
                    </span></a></li>
                    <li><a href="addfotoalbum.php"><span class="material-icons">
                        upload
                    </span></a></li>
                    <li><a href="logout.php"><span class="material-icons">
                        logout
                    </span></a></li>
                    <?php
                    if(empty($row111['foto'])){
                  ?>
            <li id="imagenperfil" ><a href="perfil.php"><img src="./img/usu.png" alt="perfil" class="circle" width="50" height="50"></a></li>
                  <?php 
                      $auxaux= './'.$usu2.'/'. $img2;

                }else{
                 ?>
            <li id="imagenperfil" ><a href="perfil.php"><img src="<?php echo './'.$usu2.'/'. $img2;?>" alt="perfil" class="circle" width="50" height="50" style="border-radius:50%"></a></li>
<?php } ?>

        </ul>
      </nav>
    </div>
    <!--La idea del menu es que dependiendo de si está logeado salga diferente, partiremos de la base en que no está el usuario logeado-->
</header>

