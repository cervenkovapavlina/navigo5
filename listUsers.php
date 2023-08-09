<?php


$dbhost = 'localhost'; //server, kde se nachází databáze (často bývá localhost)
$dbname = 'navigo'; //jméno databáze
$dbuser = 'root'; //uživatelské jméno
$dbpass = ''; //heslo


$spojeni = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);


if (!$spojeni)
 {
 //echo 'Spojení s mysql serverem se nepodařilo navázat.<br>';
 }
 else
 {
 //echo 'Spojení s mysql serverem bylo úspěšně navázáno.<br>';
//Následuje nastavení kódování a následná práce s daty
 mysqli_set_charset($spojeni, "utf8");


 $users = mysqli_fetch_all(mysqli_query($spojeni, "SELECT * FROM users"));
        // uloží všechna data z tabulky users do formátu pole polí, kdy jednotlivé prvky jsou uživatelé
        // a mají formát taky pole, kdy jednotlivé prvky jsou jednotlivé atributy uživatelů
 // print_r ($users); // Vypíše to celková data, ale ne v moc pěkném formátu - foto 1
 // print_r ($users[0]); // Vypíše to data pouze prvního uživatele, ale ne v moc pěkném formátu
//print_r (json_encode($users)); // Vypíše to celková data v lepším formátu - foto 2


$userStates = [1 => "ACTIVE", 2 => "SUSPENDED", 3 => "TERMINATED"];
$usersAsObjects = [];

for ($i = 0; $i < count($users); $i++)
{
       $userObject = ["id" => $users[$i][0], "login" => $users[$i][1], "password" => $users[$i][2], "utilization" => $users[$i][3],
"state" => $userStates[$users[$i][4]]];
        array_push($usersAsObjects, $userObject);
}

print_r(json_encode($usersAsObjects));




//Odpojení od databáze s kontrolou
//Odpojení je možné až po skončení všech skriptů, které čerpají data z databáze
 $zavreni = mysqli_close($spojeni);
 if(!$zavreni)
 {
 //echo 'Spojení s mysql serverem se nepodařilo ukončit.';
 }
 else
 {
 //echo 'Spojení s mysql serverem se podařilo ukončit.';
 }
}


?>



