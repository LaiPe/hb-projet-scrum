<?php
$i = 0;
$password = "";

function generator_password(){
    $i = 0;
    while($i < 10){
        $i++;
        $password = $password . rand(0,9);
    }
    return $password;
}
