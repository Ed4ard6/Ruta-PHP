<?php

$password = "1234567a";
var_dump((bool)preg_match('/^[0-9]{6,9}$/', $password));
/* echo preg_match('/[0-9]/', $password) ? 'Contiene numero<br>' : 'No contiene numero<br>';
echo preg_match('/[a-z]/', $password) ? 'Contiene minuscula<br>' : 'No contiene minuscula<br>';
echo preg_match('/[A-Z]/', $password) ? 'Contiene mayuscula<br>' : 'No contiene mayuscula<br>';
echo preg_match('/[!@#$%&*]/', $password) ? 'Contiene caracter especial<br>' : 'No contiene caracter especial<br>';
 */