<?php

include 'connect.php';

$date = $_POST['Edate'];
$eventName = $_POST['eventName'];    // names from forms !
$country = $_POST['country'];
$city = $_POST['city'];
$description = $_POST['description'];

try{
      global $db;
      $inserts = $db->prepare("INSERT INTO events ( eventDate , event_name , country , city , description )
                               VALUES( :Edate , :eventName , :country , :city , :description)");

      $inserts->bindParam(':Edate',$date);
      $inserts->bindParam(':eventName',$eventName);
      $inserts->bindParam(':country',$country);
      $inserts->bindParam(':city',$city);
      $inserts->bindParam(':description',$description);
      $inserts->execute();


}catch(Exeption $e){
  echo $e->getMessage();
  exit;
}


 ?>
