
  <?php

  include 'connect.php';

   ?>
  <!DOCTYPE html>
  <html>
  <head>
      <title>Trener</title>
      <link rel="stylesheet" type="text/css" href="my.css">
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <link rel="stylesheet" type="text/css" href="bootstrap.css">

  </head>
  <body>


    <div class="content1">

    <?php
      try{

        global $db;
        $result = $db->prepare("SELECT * FROM fighter ORDER BY id ASC");
        $result->execute();
        $fighters = $result->fetchAll(PDO::FETCH_ASSOC);
        /*   A cursor is used to pecess individual rows return
        by database system for a query.
        cursor holds the rows returned by squl statement.
        cursor is defined as work area where sql statement is executed
        */
        $result->closeCursor();

      }catch(Exeption $e){
        echo $e->getMessage() . " error has occured";
        exit;

      }
?>
<?php
          echo '<table border=1px> <tr><th>Club name</th><th>First name</th><th>Last name</th><th>Age</th><th>weight</th><th>height</th></tr>';

          foreach ($fighters as $member) {
            echo '<tr><td>' .$member['club_name'] . '</td><td>' .$member['first_name'] . '</td><td>' .$member['last_name'] . '</td><td>' .$member['Age'] . '</td><td>' .$member['weight'] . '</td><td>' .$member['height'] . '</td><td>';
          }

          echo '</table> <br>';

?>


<form id="adminForm" method="post"   >
  <input id="fn" name="fn" placeholder="fn"/> <br></br>
  <input id="opp1" name="opp1" placeholder="First opponent" /> <div>  vs </div>
  <input id="opp2" name="opp2" placeholder="Second opponent" /> <br></br>
  <input id="submit" class="btn btn-success" type="submit" value="submit" name="submit"/>
</form>





</div>
<script src="my.js"></script>
</body>
</html>
