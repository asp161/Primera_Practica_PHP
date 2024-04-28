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


    <!--La idea del menu es que dependiendo de si está logeado salga diferente, partiremos de la base en que no está el usuario logeado-->
    <main>
    <h2 style="margin:2em">Foto del día</h2>

    <div class="gallery">

    <?php
if(($fichero = @file("./php/file.txt")) == false)
{
echo "No se ha podido abrir el fichero";
}
else
{
echo "<pre>\n";


$cont=0;

foreach($fichero as $numLinea => $linea)
{
/*echo "Línea #<b>" . sprintf(" %03d", $numLinea) . "</b> : ";
echo htmlspecialchars($linea);*/
$cont=$cont + 1;
}
$aux=false;
while($aux==false){
    $aleatorioooo = rand(0,$cont);
    if($aleatorioooo % 3 == 0 || $aleatorioooo == 0){
        $aux=true;
    }
    if($cont==$aleatorioooo){
        $aleatorioooo=$aleatorioooo-3;
        $aux=true;
    }
}
$aux3=0;


foreach($fichero as $numLinea => $linea)
{

    if($numLinea==$aleatorioooo && $aux3<3){

    
$aleatorioooo++;
if($aux3==0){
    $usutxt=$linea;
}else if($aux3==1){
    $ruta=$linea;
}else{
    $comentario=$linea;
}
$aux3++;
    
    }
}

echo $usutxt;

echo $comentario;
$ruta=str_replace("\r\n","",$ruta);

}
echo "</pre>\n";

    $sql5 ="SELECT idfoto, titulo, fecha, pais, fichero, idPais, nomPais from fotos, paises where pais=idPais and fichero ='$ruta'";
    $qwey5 = mysqli_query($conec,$sql5);
    $row5 = mysqli_fetch_array($qwey5);


?>
<figure>
          <a href="infofoto.php?<?php echo 'id='.$row5['idfoto']?>" ><img src="img/<?php echo $row5['fichero']?>" alt="foto"></a>
          <figcaption><?php echo $row5['titulo'];?></figcaption>
          <figcaption><?php echo $row5['fecha'];?></figcaption>
          <figcaption><?php echo $row5['nomPais'];?></figcaption>
      </figure>
    </div>





    <h2 style="margin:2em">Ultimas 5 Fotos </h2>

    <div class="gallery">

    <?php
    $sql ="SELECT idfoto, titulo, fecha, pais, fichero, idPais, nomPais from fotos, paises where pais=idPais ORDER BY fregistro DESC LIMIT 5";
    $qwey = mysqli_query($conec,$sql);
      
  $i=0;
    while($row = mysqli_fetch_array($qwey)){
      
            $_SESSION['idfoto'] = $row["idfoto"];
            
         ?>
          <figure>
          <a href="infofoto.php?<?php echo 'id='.$row['idfoto']?>" ><img src="img/<?php echo $row['fichero']?>" alt="foto"></a>
          <figcaption><?php echo $row['titulo'];?></figcaption>
          <figcaption><?php echo $row['fecha'];?></figcaption>
          <figcaption><?php echo $row['nomPais'];?></figcaption>
      </figure>
      
      <?php

        $i++;
      
    }
    ?>      
          </div>

<div class="gallery">
          <h2>Consejo fotográfico</h2>

<?php
$conf = "./json/consejos.json";
$mostrar=json_decode(file_get_contents($conf));
$ale=rand(0,2);

if($ale==0){
    print_r ($mostrar->consejo1->Consejo);
    echo "<br>";
    print_r ($mostrar->consejo1->Categoria);
    echo "<br>";
    print_r ($mostrar->consejo1->Dificultad);
}else if($ale==1){
    print_r ($mostrar->consejo2->Consejo);
    echo "<br>";
    print_r ($mostrar->consejo2->Categoria);
    echo "<br>";
    print_r ($mostrar->consejo2->Dificultad);
}else{
    print_r ($mostrar->consejo3->Consejo);
    echo "<br>";
    print_r ($mostrar->consejo3->Categoria);
    echo "<br>";
    print_r ($mostrar->consejo3->Dificultad);
}
?>
   </div>       
<?php

    include "php/footer.php";
?>

</body>

</html>