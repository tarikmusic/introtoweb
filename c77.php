<?php

include 'connect.php';

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>category 77</title>
    <link rel="stylesheet"  href="my.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

</head>
<body>

<p class="proba">bekir debil </p>
<div class="content">

    <?php
      try{

        global $db;
        $result = $db->prepare("SELECT * FROM opponents ORDER BY id ASC");
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
        echo ' <table >  <tr><th>Fight Number</th><th>First Fighter</th><th>Second Fighter</th></tr>';

    foreach($names as $name){


        echo '<tr><td>' . $name['fight_number'] . '</td><td>' . $name['first'] . '</td> <td> <b> vs </b> <td>  <td>' . $name['second'] . '</td></tr>';


    }

    echo '</table>';

 ?>



</div>

  <script src="myapps.js"></script>
</body>


</html>
