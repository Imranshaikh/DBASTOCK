<!DOCTYPE html>
<?php

  $con = mysql_connect("localhost","root","1234");
  if(!$con){
    die('Could no connect' . mysql_error());
  }
  mysql_select_db('dbaimages', $con) or die(mysql_error());

?>

<html>
  <head>
    <title>Image stock</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 col-md-offset-3">
          <form role="form" name="imagestock" method="POST" action="imgview.php">
            <table class="table table-bordered">
              <tr>
                <td>
                  <label>Group</label>
                </td>
                <td>
                  <select class="form-control col-md-4" name="grp">
                    <?php
                      $sql = "SELECT * FROM `dbaimages`.`itemgrp`" ;
                      $qry = mysql_query($sql, $con) or die(mysql_error());
                      while ($group = mysql_fetch_assoc($qry))
                      {
                        echo "<option value=\"$group[code]\">$group[name]</option> \n";
                      }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label>As On Date</label>
                </td>
                <td>
                  <input type="date" name="asondate" />
                </td>
              </tr>
            </table>
            <input type="submit" name="View" class="btn btn-success" />
          </form>

        </div>
      </div>

    </div>
  </body>

</html>
