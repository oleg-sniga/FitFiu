<?php
$json_file = 'landing-data.json';
$pass = 'Zml0Zml1NTU1'; //pass: fitfiu555
$json_arr = null;

$formPass = '<form action="admin.php" method="POST"><input name="pass" type="password" placeholder="introducir la contraseña"><button type="submit">OK</button></form>';

if (!empty($_SERVER['HTTPS']) && 'off' !== strtolower($_SERVER['HTTPS'])) {
  $http = 'http://';
} else {
  $http = 'https://';
}
$hostName = $http.$_SERVER['HTTP_HOST'];