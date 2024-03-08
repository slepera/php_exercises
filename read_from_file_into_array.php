
<?php

$json = file_get_contents('students.json'); 

$json_data = json_decode($json,true); 

$students = $json_data["students"];

foreach($students as $student)
{
    $name = $student["name"]; 
    for($i = 0; $i < strlen($name); $i++)
    {
        print($name[$i]);
    }
    print("\n");
}




?>
