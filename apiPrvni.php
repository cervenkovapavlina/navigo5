<?php
$hours = $_POST["hours"];
$hourlyRate = $_POST["hourlyRate"];
$currencyId = $_POST["currencyId"];
$rateEur = 25;
$costCzk = null;
if ($currencyId == 2)
{$costCzk = $hours * $hourlyRate * $rateEur; }
else
{$costCzk = $hours * $hourlyRate; }

echo $costCzk;
?>


