<?php
 print_r($_REQUEST);

 foreach($_REQUEST as $key => $value){
    echo "<p>El campo es: <strong>$key</strong> y el valor es: <strong>$value</strong></p>";
 }