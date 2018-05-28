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

  <?php
    try{

      global $db;
      $result = $db->prepare("SELECT * FROM events ORDER BY id ASC");
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

        $e = "no events soon";

        foreach ($fighters as $d) {
          $d = $d['eventDate'];
         break;
        }
        foreach($fighters as $e){
          $e = $e['event_name'];
           break;
        }




?>

  <main>
  <header class="tm-header">
    <div class=tm-container>
      <img src="logo_gloves.png" alt="logo" width="120" class="tm-logo">
        <table class="countDownContainer ">
          <tr>
            <td colspan="4" class="info" style="color: red"><b><i><?php echo $e ?></i></b></td>
          </tr>
          <tr class="info">
            <td class="bold" id="days">00</td>
            <td class="lijevo bold" id="hours">00</td>
            <td class="lijevo bold"  id="minuts">00</td>
            <td class="lijevo bold"  id="seconds">00</td>
          </tr>
          <tr>
            <td>Days</td>
            <td class="lijevo" >Hours</td>
            <td class="lijevo" >Minutes</td>
            <td class="lijevo" >Seconds</td>
          </tr>
        </table>


        <script type="text/javascript">
          var date = "<?php echo $d ?>";


          function countdown(){

            var now = new Date();
            var eventDate = new Date(date);

            var currentTime = now.getTime();
            var eventTime = eventDate.getTime();

            var remTime = eventTime - currentTime;

            var s = Math.floor(remTime / 1000);
            var m = Math.floor(s / 60);
            var h = Math.floor(m / 60);
            var d = Math.floor(h / 24);

            h %= 24;
            m %= 60;
            s %= 60;

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

          //  console.log(d + " hours: " + h + " minutes: " + m);

            document.getElementById("days").textContent = d;
            document.getElementById("hours").textContent = h;
            document.getElementById("minuts").textContent = m;
            document.getElementById("seconds").textContent = s;

            setTimeout(countdown, 1000);


          }

          countdown();
        </script>

    <!--  ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,  -->
      <nav class="tm-nav">
        <ul>
            <li><a href="#" data-target="fighters" class="nav-link fight">Fights</a></li>
            <li><a href="#" data-target="trener" class="nav-link fight">Trener</a></li>
            <li><a href="#" data-target="admin" class="nav-link fight">Admin </a></li>
            <li><a href="#" data-target="home" class="nav-link fight">Home</a></li>
            <li><a href="#" data-target="rank" class="nav-link fight">Rank lista</a></li>
        </ul>
      </nav>
  </div>
  </header>





  <div class="page active" id="home">
    <p></p>
    <p class="pp">upcoming events</p>
    <p></p>

    <div class="event">


              <?php
                try{

                  global $db;
                  $result = $db->prepare("SELECT * FROM events ORDER BY id ASC");
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
                  echo ' <table class="table table-striped " >  <tr><th>Date</th><th>Event name</th><th>Country</th><th>City</th><th>Description</th></tr>';

              foreach($names as $name){


                  echo '<tr><td>' . $name['eventDate'] . '</td><td>' . $name['event_name'] . '</td><td>' . $name['country'] . '</td><td>' . $name['city'] .'</td><td>'. $name['description'] . '</td></tr>';


              }

              echo '</table>';

           ?>


  </div> <!-- ovaj mi je gdje ce se ovo ubacivat !  -->
  </div>
  <div class="page " id="trener">
    <p></p>
    <p></p>
    <p></p>

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
       lname: {
         minlength: 2,
         maxlength: 20
       }
     },
     messages: {
       lname: {
         required: "please enter surname",
         minlength: "to low",
         maxlength: "to much"
       }
     },
     submitHandler: function(form) {
       if (confirm('are you shure ?')){


       }else{
         alert('ok you dont have to ');
       }
     }
   });



</script>



  </div>

  <div class="page" id="fighters">


    <p></p>
    <p class="centar" ><b><?php echo $e ?></b> <i>  fight schedules</i></p>
    <p></p>
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
            echo ' <table class="table table-striped " >  <tr><th>Fight Number</th><th style= "color: red">Red corner</th><th style="color: blue">Blue corner</th></tr>';

        foreach($names as $name){
            echo '<tr><td>' . $name['fight_number'] . '</td><td>' . $name['first'] . '</td><td>' . $name['second'] . '</td></tr>';
        }

        echo '</table>';

     ?>
    </div>

  </div>

  <div class="page" id="admin">
    <p></p>
    <p></p>
    <p></p>
      <h1 class="fomrh1"><b>Log in</b></h1>

    <form class="Tform" id="loginForm" method="post" action="login_admin_check.php"  >
      <input class="Tin" id="username" name="username" placeholder="Username" />
      <input class="Tin" id="pass" name="pass" placeholder="password" />
      <input class="Tin" id="submit" class="btn btn-success " type="submit" value="Send" name="Submit"  />
    </form>

<!--<button class="singup" ><a href="#" data-target="nesto" class="nav-link">sing up</a></button> -->

  </div>

  <div class="page" id="rank">
    <p></p>
    <p class="centar" > <b> Rank Lista </b> </p>
    <p></p>

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
              $wins = array();
              $losess = array();
              $res = array();
              $counter = 0;
              foreach ($fighters as $member) {
                $fighterName[$counter] = $member['first_name'] . " " . $member['last_name'];
                $wins[$counter] =  $member['wins'];
                $losess[$counter] =  $member['losess'];
                $res[$counter] = $wins[$counter] - $losess[$counter];
                $counter++;
              }

              for($i=0; $i <= $counter; $i++){

                for($j=1; $j < $counter - $i;$j++){
                  if($res[$j-1]>$res[$j]){
                    $temp = $res[$j-1];
                    $res[$j-1] = $res[$j];
                    $res[$j] = $temp;

                    $tempName = $fighterName[$j-1];
                    $fighterName[$j-1] = $fighterName[$j];
                    $fighterName[$j] = $tempName;

                  }
                }
              }

                echo ' <table class="table table-striped " >  <tr><th>Fighter Name</th><th>Ratio</th></tr>';

              for($p=0; $p < $counter; $p++){

                  echo '<tr><td>' .  $fighterName[$p] . '</td><td>' . $res[$p]. '</td></tr>';
              }

            echo  '</table>';
    ?>


  </div>

  </main>
  <script src="project.js"></script>
</body>
</html>
