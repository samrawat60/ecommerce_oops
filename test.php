<?php  
require_once("safeadmin/lib/Database.php");

$db = new Database();

$db->insert('employee',[
    'name'        => 'Samy',
    'address'     => 'Burari New Delhi',
    'gender'      => 'Male',
    'designation' => 'PHP Developer',
    'age'         => '26'
]);

echo "Insert result is : ";
print_r($db->getResult())



?>