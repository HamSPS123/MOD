<?php
$servername = "103.114.146.13";
$username ="mk001";
$password ="mk001@2019";
$db_name = "mod2";
// $servername = "Localhost";
// $username ="root";
// $password ="";
// $db_name = "mod";
$conn = mysqli_connect("$servername", "$username", "$password", "$db_name") or die("ບໍ່ສາມາດເຊື່ອຕໍ່ຖານຂໍ້ມູນໄດ້");
function ConverToRoman($num){ 
    $n = intval($num); 
    $res = ''; 

    //array of roman numbers
    $romanNumber_Array = array( 
        'M'  => 1000, 
        'CM' => 900, 
        'D'  => 500, 
        'CD' => 400, 
        'C'  => 100, 
        'XC' => 90, 
        'L'  => 50, 
        'XL' => 40, 
        'X'  => 10, 
        'IX' => 9, 
        'V'  => 5, 
        'IV' => 4, 
        'I'  => 1); 

    foreach ($romanNumber_Array as $roman => $number){ 
        //divide to get  matches
        $matches = intval($n / $number); 

        //assign the roman char * $matches
        $res .= str_repeat($roman, $matches); 

        //substract from the number
        $n = $n % $number; 
    } 

    // return the result
    return $res; 
} 
?>