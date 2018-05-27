<?php

include 'connect.php';

$fn = $_POST['fn'];
$opp1 = $_POST['opp'];
$opp2 = $_POST['opp2'];

try{

    global $db;
    $inserts = $db->prepare("INSERT INTO opponents (first , second , fight_number) VALUES( :opp , :opp2 , :fn)");

    $inserts->bindParam(':opp',$opp1);
    $inserts->bindParam(':opp2',$opp2);
    $inserts->bindParam(':fn',$fn);
    $inserts->execute();
}
catch (Exception $e){
echo $e->getMessage();
exit;

}

 ?>
