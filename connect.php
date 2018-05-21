<?php

try{                                                            #here with root should be a password
$db = new PDO('mysql:host=localhost;dbname=kickbox;','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//var_dump($db);
}catch(Exception $e){
  echo "error is occured ! " . $e;
}


 ?>
