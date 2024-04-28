




<?php
Session_start();
Session_destroy();
setcookie("UsuarioCookie", "", time()+(60*60*24*90));
setcookie("ContrasenaCookie", "", time()+(60*60*24*90));
setcookie("UltvezCookie", "", time()+(60*60*24*90));
header("Location: ./index.php",TRUE,301);

?>