<?php
    include_once 'functions.php';
    $clave = "123456";
    $llave = "proyecto_2023";
    $new_clave = encrypt($clave,$llave);
    echo "la clave inicial es : ".$clave;
    echo "<br>";
    echo "La clave encriptada es : ".$new_clave;
    $clave_gen = generar_clave(8);
    echo "La clave generada es : ".$clave_gen;
?>