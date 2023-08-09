<?php

$dbhost = 'localhost'; //server, kde se nachází databáze (často bývá localhost)
$dbname = 'navigo'; //jméno databáze
$dbuser = 'root'; //uživatelské jméno
$dbpass = ''; //heslo

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conn)
 {
       die("Nepovedlo se navázat spojení");
 }
 else
 {
 
 mysqli_set_charset($conn, "utf8");



$login = $_POST["username"];
$password = $_POST["password"];
$utilization = $_POST["utilization"];
$state = $_POST["state"];

$stateArray = ["ACTIVE" => 1, "SUSPENDED" => 2, "TERMINATED" => 3];
$stateInt = $stateArray[$state];

$sql = "INSERT INTO users (login, password, utilization, state)
 VALUES ('$login', '$password', $utilization, $stateInt)";


if ($conn->query($sql) == TRUE){
       echo "New record created successfully";
}
else {
       echo "Error: " . $sql . "<br>" . $conn->error;
}
 


//Odpojení od databáze
 $close = mysqli_close($conn);
 if(!$close)
 {
 }
 else
 {
 }
}

?>


