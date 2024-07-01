<?php

echo "Welcome to the functions <br>";

function hello($arr){

    $sum = 0;
    foreach($arr as $value){
        $sum += $value;
    }
    return $sum;

    
}
$abdullah = [5,4];

echo  hello($abdullah);


?>