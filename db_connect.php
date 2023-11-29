<?php
function connect(){
$hostname="localhost";
$dbname="salty";
$username="root";
$password="root";

$dsn = "mysql:host=$hostname;dbname=$dbname";

try {
  $db = new PDO($dsn, $username, $password);
  return $db;
}
catch (Exception $e){
  echo $e->getMessage();
}
}
connect();
?>