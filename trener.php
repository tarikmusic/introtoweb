<?php

include 'connect.php';

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <title>Trener</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

</head>
<body>





<form  id="fighterForm" method="post" >
  <input id="cname" name="cname" placeholder="Club Name" required /> <br>
  <input id="fname"   name="fname" placeholder="First Name" required /> <br>
  <input id="lname" name="lname" placeholder="Last Name" required/> <br>
  <input id="age" name="age" placeholder="Age" required/> <br>
  <input id="weight" name="weight" placeholder="Weight" required /> <br>
  <input id="height" name="height" placeholder="Height" required/> <br>
  <input id="wins" name="wins" placeholder="wins" required/> <br>
  <input id="losess" name="losess" placeholder="losess" required/> <br>
  <input id="accomplishment" name="accomplishment" placeholder="accomplishment" required /> <br>
  <input id="submit" class="btn btn-success" type="submit" value="submit" name="submit"/>
</form>




  <script src="myapps.js"></script>
</body>


</html>
