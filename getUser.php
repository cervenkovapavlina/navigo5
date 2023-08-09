<?php

$dbhost = 'localhost'; //server, kde se nachází databáze (často bývá localhost)
$dbname = 'navigo'; //jméno databáze
$dbuser = 'root'; //uživatelské jméno
$dbpass = ''; //heslo

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conn)
 {
 //echo 'Spojení s mysql serverem se nepodařilo navázat.<br>';
 }
 else
 {
 //echo 'Spojení s mysql serverem bylo úspěšně navázáno.<br>';
//Následuje nastavení kódování a následná práce s daty 
 mysqli_set_charset($conn, "utf8");

 

$userId = $_GET["id"];  // id se předalo v rámci funkce loadUserData(id) v updateUser.js

$user = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM users where id = $userId"))[0];
// dostanu pole uživatelů, kde bude jen jeden uživatel, do té proměnné user chci jen tohoto jednoho uživatele
// takže ho vyberu z toho pole - je na indexu 0

$userStates = [1 => "ACTIVE", 2 => "SUSPENDED", 3 => "TERMINATED"];

$userArray = ["id" => $user[0], "login" => $user[1], "password" => $user[2], "utilization" => $user[3],
"state" => $userStates[$user[4]]];

print_r(json_encode($userArray));
//print_r("<br/>");     // odřádkování, br není párové, ukončuje se lomítkem za br
//print_r("<br/>");  


  $close = mysqli_close($conn);
 if(!$close)
 {
 }
 else
 {
 }
}
?>







