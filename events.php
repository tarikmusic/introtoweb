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

           <title>EVENTS</title>
     </head>
<body>


      <h1 class="fomrh1"><b>Add event</b></h1>

      <form class="Tform"  id="eventForm" method="post" >
        <input class="Tin" id="Edate" name="Edate" placeholder="year,month,day" /> <br>
        <input class="Tin" id="eventName"   name="eventName" placeholder="Event name"  /> <br>
        <input class="Tin" id="country" name="country" placeholder="country" /> <br>
        <input class="Tin" id="city" name="city" placeholder="city" required/> <br>
        <input class="Tin" id="description" name="description" placeholder="description" /> <br>
        <input class="Tin" id="submit" class="btn btn-success" type="submit" value="submit" name="submit"/>
      </form>

      <script>
      $("#eventForm").validate({
           rules: {
             eventName: {
               minlength: 2,
               maxlength: 5
             }
           },
           messages: {
             eventName: {
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
