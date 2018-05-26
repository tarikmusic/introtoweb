<?php

include 'connect.php';

$cname = $_POST['cname'];
$fname = $_POST['fname'];    // names from forms !
$lname = $_POST['lname'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$wins = $_POST['wins'];
$losess= $_POST['losess'];
$accomp = $_POST['accomplishment'];

try{
      global $db;
      $inserts = $db->prepare("INSERT INTO fighter (club_name , first_name , last_name , Age , weight , height , wins , losess , bigest_accomplishment)
                               VALUES( :cname , :fname , :lname , :age , :weight , :height , :wins , :losess , :accomplishment)");

      $inserts->bindParam(':cname',$cname);
      $inserts->bindParam(':fname',$fname);
      $inserts->bindParam(':lname',$lname);
      $inserts->bindParam(':age',$age);
      $inserts->bindParam(':weight',$weight);
      $inserts->bindParam(':height',$height);
      $inserts->bindParam(':wins',$wins);
      $inserts->bindParam(':losess',$losess);
      $inserts->bindParam(':accomplishment',$accomp);
      $inserts->execute();


}catch(Exeption $e){
  echo $e->getMessage();
  exit;
}


 ?>
