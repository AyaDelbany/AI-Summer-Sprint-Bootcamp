<?php 
define('SERVER_NAME','localhost');
define('USERNAME','root');
define('PASSWORD', '');
define('DATABASE','prescription_refill');
$con = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DATABASE);
if(!$con)
    die("Unable to connect");


?>