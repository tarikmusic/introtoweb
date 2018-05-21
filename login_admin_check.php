<?php

include 'connect.php';


$name = $_POST['username'];
$pass = $_POST['pass']



 ?>

 <!DOCTYPE html>
<html>
<head>
    <title>Ajax</title>
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

      if( $names == true) { ?>

        <ul class="group">
          <?php
              foreach ($names as $user) {

                $user = $user['username']; ?>
              }




      <?php  }  ?>

    </ul>


  <?php } ?>
<?php
  if($name == $user ){
    header('Location: admin.php');
  }else{
    echo "worng !";
  }

  ?>

</div>
</body>
</html>
