<?php

include 'connect.php';


$name = $_POST['username'];
$pass = $_POST['pass']



 ?>

 <!DOCTYPE html>
<html>
<head>
    <title>Check</title>
    <link rel="stylesheet" type="text/css" href="my.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

</head>
<body>


<div class="content">

    <?php
      try{

        global $db;
        $result = $db->prepare("SELECT * FROM admin_login ");
        $result->execute();
        $names = $result->fetchAll(PDO::FETCH_ASSOC);
        /*   A cursor is used to pecess individual rows return
        by database system for a query.
        cursor holds the rows returned by squl statement.
        cursor is defined as work area where sql statement is executed
        */
        $result->closeCursor();

      }catch(Exeption $e){
        echo $e->getMessage();
        exit;

      }
 ?>


          <?php
              foreach ($names as $user) {

                $user = $user['username'];
              }
                foreach ($names as $user2) {

                  $user2 = $user2['password'];
                }
         ?>
<?php
  if($name == $user  && $pass == $user2){
    header('Location:   admin.php');
  }else{
    echo '<p class="ppp">wrong , try again</p>';
  }

  ?>

</div>
</body>
</html>
