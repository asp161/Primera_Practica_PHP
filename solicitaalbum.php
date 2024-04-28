<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Alvaro Sánchez Pinedo e Irene Onsurbe">
    <meta name="description" content="Practica1PCW">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="./js/tabla.js"></script>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>DAW</title>
</head>

<body onload="addRow();">



    <?php
 include "php/estiloseleccion.php";

    ?>
    
    <main>
       
        <table>

                
            <caption>Tarifas</caption>
            <tr>
            <th>Concepto</th>
            <th>Tarifa</th>
            </tr>
            <tr>
                <td> &lt; 5 páginas</td>
                <td> 0,10 € por pág.</td>
            </tr>
            <tr>
                <td> entre 5 y 11 páginas</td>
                <td> 0,08 € por pág.</td>
            </tr>
            <tr>
                <td> &gt; 11 páginas</td>
                <td> 0,07 € por pág.</td>
            </tr>
            <tr>
                <td> Blanco y negro</td>
                <td> 0 € </td>
            </tr>
            <tr>
                <td> Color</td>
                <td> 0,05 € por foto</td>
            </tr>
            <tr>
                <td> Resolución &gt; 300 dpi</td>
                <td> 0,02 € por foto </td>
            </tr>
        </table>
        
        <!--Tabla que se genera auto-->
        <table id="tablaA">
            <tr>
                <th colspan="2"></th>
                <th colspan="2">Blanco y Negro</th>
                <th colspan="2">Color</th>
            </tr>
            <tr>
                <th>Número de páginas</th>
                <th>Número de fotos</th>
                <th>150-300 dpi</th>
                <th>450-900 dpi</th>
                <th>150-300 dpi</th>
                <th>450-900 dpi</th>
            </tr>
        </table>
        
        <br>
        <section>
    
        <?php
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



/*
    if(isset($_POST['enviar'])) { 
        if($_POST['nombre'] == ''  or $_POST['titulo'] == '' or $_POST['email'] == '' or $_POST['calle'] == '') { 
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
    
                    echo 'Usted se ha registrado correctamente.'; 
                    header('Location:resalbum.php');
            }  
        } */
    
    ?>
    
        <form id="formulario" method="POST" action="resalbum.php">

            <label for="nombre">Nombre:(*)<input type="text" name="nombre" id="nombre" placeholder="su nombre"  maxlength="200"></label>
            <label for="titulo">Título del álbum: (*)<input type="text" name="titulo" id="titulo" placeholder="Titulo del álbum" maxlength="200" ></label>
            <label for="texto">Texto adicional: <textarea name="texto" id="texto" placeholder="Dedicatura,descripción,etc" maxlength="4000"></textarea></label>
            <label for="email">Correo electrónico: (*)<input type="email" name="email" id="email" placeholder="Tu e-mail" maxlength="200" ></label>
            <label for="direccion">Dirección (*)<input type="text" name="calle" id="direccion" placeholder="calle" ></label>
            <label for="numero"> <input type="number" name="numero" id="numero" placeholder="número" ></label>
            <label><input  type="number" name="cp" id="cp" placeholder="CP"  maxlength="6"></label>
           <select  name="localidad" class="form-control">
                <option value="">Localidad</option>
                <option value="Álava/Araba">Álava/Araba</option>
                <option value="Albacete">Albacete</option>
                <option value="Alicante">Alicante</option>
                <option value="Almería">Almería</option>
                <option value="Asturias">Asturias</option>
                <option value="Ávila">Ávila</option>
                <option value="Badajoz">Badajoz</option>
                <option value="Baleares">Baleares</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Burgos">Burgos</option>
                <option value="Cáceres">Cáceres</option>
                <option value="Cádiz">Cádiz</option>
                <option value="Cantabria">Cantabria</option>
                <option value="Castellón">Castellón</option>
                <option value="Ceuta">Ceuta</option>
                <option value="Ciudad Real">Ciudad Real</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Cuenca">Cuenca</option>
                <option value="Gerona/Girona">Gerona/Girona</option>
                <option value="Granada">Granada</option>
                <option value="Guadalajara">Guadalajara</option>
                <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                <option value="Huelva">Huelva</option>
                <option value="Huesca">Huesca</option>
                <option value="Jaén">Jaén</option>
                <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Las Palmas">Las Palmas</option>
                <option value="León">León</option>
                <option value="Lérida/Lleida">Lérida/Lleida</option>
                <option value="Lugo">Lugo</option>
                <option value="Madrid">Madrid</option>
                <option value="Málaga">Málaga</option>
                <option value="Melilla">Melilla</option>
                <option value="Murcia">Murcia</option>
                <option value="Navarra">Navarra</option>
                <option value="Orense/Ourense">Orense/Ourense</option>
                <option value="Palencia">Palencia</option>
                <option value="Pontevedra">Pontevedra</option>
                <option value="Salamanca">Salamanca</option>
                <option value="Segovia">Segovia</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Soria">Soria</option>
                <option value="Tarragona">Tarragona</option>
                <option value="Tenerife">Tenerife</option>
                <option value="Teruel">Teruel</option>
                <option value="Toledo">Toledo</option>
                <option value="Valencia">Valencia</option>
                <option value="Valladolid">Valladolid</option>
                <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                <option value="Zamora">Zamora</option>
                <option value="Zaragoza">Zaragoza</option>
              </select>
            <select  name="provincia" class="form-control">
                <option value="">Provincia</option>
                <option value="Álava/Araba">Álava/Araba</option>
                <option value="Albacete">Albacete</option>
                <option value="Alicante">Alicante</option>
                <option value="Almería">Almería</option>
                <option value="Asturias">Asturias</option>
                <option value="Ávila">Ávila</option>
                <option value="Badajoz">Badajoz</option>
                <option value="Baleares">Baleares</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Burgos">Burgos</option>
                <option value="Cáceres">Cáceres</option>
                <option value="Cádiz">Cádiz</option>
                <option value="Cantabria">Cantabria</option>
                <option value="Castellón">Castellón</option>
                <option value="Ceuta">Ceuta</option>
                <option value="Ciudad Real">Ciudad Real</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Cuenca">Cuenca</option>
                <option value="Gerona/Girona">Gerona/Girona</option>
                <option value="Granada">Granada</option>
                <option value="Guadalajara">Guadalajara</option>
                <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                <option value="Huelva">Huelva</option>
                <option value="Huesca">Huesca</option>
                <option value="Jaén">Jaén</option>
                <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Las Palmas">Las Palmas</option>
                <option value="León">León</option>
                <option value="Lérida/Lleida">Lérida/Lleida</option>
                <option value="Lugo">Lugo</option>
                <option value="Madrid">Madrid</option>
                <option value="Málaga">Málaga</option>
                <option value="Melilla">Melilla</option>
                <option value="Murcia">Murcia</option>
                <option value="Navarra">Navarra</option>
                <option value="Orense/Ourense">Orense/Ourense</option>
                <option value="Palencia">Palencia</option>
                <option value="Pontevedra">Pontevedra</option>
                <option value="Salamanca">Salamanca</option>
                <option value="Segovia">Segovia</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Soria">Soria</option>
                <option value="Tarragona">Tarragona</option>
                <option value="Tenerife">Tenerife</option>
                <option value="Teruel">Teruel</option>
                <option value="Toledo">Toledo</option>
                <option value="Valencia">Valencia</option>
                <option value="Valladolid">Valladolid</option>
                <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                <option value="Zamora">Zamora</option>
                <option value="Zaragoza">Zaragoza</option>
              </select>
              <label>Resolución de impresión:<input type="number" name="cp2" id="cp2" placeholder="150 dpi" min="150" max="900" step="150"  ></label>
                <br><label for="albumes">Álbum de PI (*): <select name="albumes" id="albumes" class="form-control" >           
                <option value="">mis álbumes</option>
                <?php $sql = "SELECT * FROM albumes where usuario = '$usu'";
                $qwey = mysqli_query($conec,$sql);
                while($row = mysqli_fetch_array($qwey)){
                $idalbum = $row['idalbum'];
                $nomalbu = $row['titulo'];
                ?>
                <option value="<?php echo $idalbum ?>"><?php echo $nomalbu ?></option>
              <?php
              }
              ?>
            
            </select></label>
            <label for="telf">Teléfono: <input type="tel" name="telf" id="telf" maxlength="9"></label>
            <label for="copias">Copias: <input type="number" name="copias" id="copias" placeholder="1" min="1"></label>
            <label for="color">Color de la portada:<input type="color" name="color" id="color"></label>
           
            <label>Fecha recepción: <input type="date" name="fecha" id="fecha"> Fecha aproximada de recepción</label>
            <label>¿Impresión a color?<input type="checkbox" name="colo" id="colo" value="1"></label>
            <input type="submit" value="Enviar" name="enviar" class="peticioninput">

        </form>
    </section>
    </main>
    <?php 
    include "php/footer.php";
  ?>

</body>



</html>
