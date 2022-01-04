<?php
$students = [
       
    "std1" => ["name" => "Root1","age" => 21,"gpa" => 3.4] , 
    "std2" => ["name" => "Root2","age" => 22,"gpa" => 3.5],
    "std3" => ["name" => "Root3","age" => 23,"gpa" => 3.6]];

     foreach ($students as $key => $value) {
         # code...
         foreach ($value as $subKey => $subArray) {
             # code...
             echo $subKey.':'. $subArray ;
         }
         echo '<br>';
     }
    ?>