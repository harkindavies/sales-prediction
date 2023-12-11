<?php
//password hashing
$timeTarget = 0.50;

$cost = 8;
$password = "qazwsxedcrfvtgbyhnujm";
do{
    $cost++;
    $start = microtime(true);
    $hashpassword = password_hash($password, PASSWORD_BCRYPT, ["cost"=>$cost]);
    $end = microtime(true);
}
while (($end - $start) < $timeTarget);

echo $hashpassword;
echo "<br> All good"
?>