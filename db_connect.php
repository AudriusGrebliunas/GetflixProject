<?php
function connect(){
$hostname="localhost";
$dbname="salty";
$username="root";
$password="root";

$dsn = "mysql:host=$hostname;dbname=$dbname";

try {
return $db = new PDO($dsn, $username, $password);
}
catch (Exception $e){
  echo $e->getMessage();
}
}

?>