<?php

include 'connect.php';

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
          <meta charset="UTF-8">
          <link rel="stylesheet" type="text/css" href="my.css" />
          <link rel="stylesheet" type="text/css" href="bootstrap.css">
          <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

          <title>KICKBOXING</title>
    </head>
<body class="tm-body">
  <main>
  <header class="tm-header">
    <div class=tm-container>
      <img src="logo_gloves.png" alt="logo" width="120" class="tm-logo">
      <nav class="tm-nav">
        <ul>
            <li><a href="#" data-target="fighters" class="nav-link">Fights</a></li>
            <li><a href="#" data-target="trener" class="nav-link">trener</a></li>
            <li><a href="#" data-target="admin" class="nav-link">admin </a></li>
            <li><a href="#" data-target="home" class="nav-link">home</a></li>
        </ul>
      </nav>
  </div>
  </header>





  <div class="page active" id="home">
    <h1>HOME</h1>
    <p> how beautiful day is today ! </p>

  </div>
  <div class="page " id="trener">

    <h1 class="fomrh1"><b>Enter participants</b></h1>

    <form class="Tform"  id="fighterForm" method="post" >
      <input class="Tin" id="cname" name="cname" placeholder="Club Name" /> <br>
      <input class="Tin" id="fname"   name="fname" placeholder="First Name"  /> <br>
      <input class="Tin" id="lname" name="lname" placeholder="Last Name" /> <br>
      <input class="Tin" id="age" name="age" placeholder="Age" required/> <br>
      <input class="Tin" id="weight" name="weight" placeholder="Weight" /> <br>
      <input class="Tin" id="height" name="height" placeholder="Height" /> <br>
      <input class="Tin" id="wins" name="wins" placeholder="wins" /> <br>
      <input class="Tin" id="losess" name="losess" placeholder="losess" /> <br>
      <input class="Tin" id="accomplishment" name="accomplishment" placeholder="accomplishment" /> <br>
      <input class="Tin" id="submit" class="btn btn-success" type="submit" value="submit" name="submit"/>
    </form>

<script>
$("#fighterForm").validate({
     rules: {
       lastname: {
         minlength: 2,
         maxlength: 5
       }
     },
     messages: {
       lastname: {
         required: "Hamdija de,der majke ti unesi prezime",
         minlength: "Unesi der koje slovo",
         maxlength: "Precero si hamdija"
       }
     },
     submitHandler: function(form) {
       if (confirm('Jesi fakat fakat fakat siguran da hoces da submitas????')){
         jQuery(document).ready(function(){


             $("#fighterForm").submit(function(e){

               e.preventDefault(); // prevents refreshing the page !

               var inputs = $(this).serialize();
             });
         });
       }else{
         alert('Dobro ne moras odmah psovati');
       }
     }
   });



</script>

  </div>

  <div class="page" id="fighters">


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


  </div>

  <div class="page" id="admin">


    <div class="content">



    <form id="loginForm" method="post" action="login_admin_check.php"  >
      <input id="username" name="username" placeholder="Username" />
      <input id="pass" name="pass" placeholder="password" />
        <input id="submit" class="btn btn-success" type="submit" value="Send" name="Submit"/>
    </form>



    </div>

  </div>



  </main>
  <script src="my.js"></script>
</body>
</html>
