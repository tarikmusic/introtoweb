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
           maxlength: 5
         }
       },
       messages: {
         lname: {
           required: "Hamdija de,der majke ti unesi prezime",
           minlength: "Unesi der koje slovo",
           maxlength: "Precero si hamdija"
         }
       },
       submitHandler: function(form) {
         if (confirm('Jesi fakat fakat fakat siguran da hoces da submitas????')){


         }else{
           alert('Dobro ne moras odmah psovati');
         }
       }
     });






  </script>



  <script src="project.js"></script>
</body>


</html>
