
  <?php

  include 'connect.php';

   ?>
  <!DOCTYPE html>
  <html>
  <head>
      <title>Admin</title>
      <link rel="stylesheet" type="text/css" href="my.css">
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
      <link rel="stylesheet" type="text/css" href="bootstrap.css">

  </head>
  <body>


    <div class="content1 ">

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
          echo '<table border="1px"  class="table table-striped "> <tr><th>Club name</th><th>First name</th><th>Last name</th><th>Age</th><th>weight</th><th>height</th><th>wins</th><th>losess</th><th>accomplishments</th></tr>';

          foreach ($fighters as $member) {
            echo '<tr><td>' .$member['club_name'] . '</td><td>' .$member['first_name'] . '</td><td>' .$member['last_name'] . '</td><td>' .$member['Age'] . '</td><td>' .$member['weight'] . '</td><td>' .$member['height'] . '</td><td>' .$member['wins'] . '</td><td>' . $member['losess'] .'</td><td>'.$member['bigest_accomplishment'] .'</td><tr>';
          }

          echo '</table> <br>';

?>



<form  class="Tform" id="adminForm" method="post"   >
  <input style="border: 3px solid red" class="Tin" id="fn" name="fn" placeholder="fight number" required/> <br></br>
  <input style="border: 3px solid red" class="Tin" id="opp" name="opp" placeholder="First opponent" /> <div>  vs </div>
  <input style="border: 3px solid red" class="Tin" id="opp2" name="opp2" placeholder="Second opponent" /> <br></br>
  <input style="border: 3px solid red" class="Tin" id="submit" class="btn btn-success" type="submit" value="submit" name="submit"/> <br>
  <button style="height: 60px"  class="Tin" class="btn btn-success"><a href="events.php" >Add event</a></button>
</form>

<script>
$("#adminForm").validate({
     rules: {
       opp: {
         minlength: 2,
         maxlength: 20
       },
       opp2: {
         minlength: 2,
         maxlength: 20
       }
     },
     messages: {
       opp: {
         required: "please enter first opponent",
         minlength: "to low",
         maxlength: "to much"
       },
       opp2: {
         required: "please enter first opponent",
         minlength: "to low",
         maxlength: "to much"
       }
     },
     submitHandler: function(form) {
       if (confirm('are you shure ? ')){


       }else{
         alert('ok');
       }
     }
   });

</script>

</div>
<script src="project.js"></script>
</body>
</html>
