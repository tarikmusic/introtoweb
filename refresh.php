
  <?php

  include 'connect.php';


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

      if( $fighters == true) { ?>

            <table >
              <td>
          <?php

              foreach ($fighters as $fighter) {

              $fighter = $fighter['club_name'] .' '. $fighter['first_name'].' '. $fighter['last_name'].' '. $fighter['Age']
              .' '. $fighter['weight'].' '. $fighter['height'].' '. $fighter['wins'].' '. $fighter['losess'].' '. $fighter['bigest_accomplishment'];?>

              <tr><?php echo $fighter; ?> }</tr>

              <td>
            </table>


    <?php  }  ?>


<?php  }  ?>

<p class="success">Name successfully added .</p>
