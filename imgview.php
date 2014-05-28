<!DOCTYPE html>
<?php

  $con = mysql_connect("localhost","root","1234");
  if(!$con){
    die('Could no connect' . mysql_error());
  }
  mysql_select_db('dbaimages', $con) or die(mysql_error());

  $itemcode = $_POST['grp']['code'];
  $asondate = $_POST['asondate'];

  $groupcond = "";
  if (!empty($itemcode)) {
    $groupcond = "AND `itemgrp` = $itemcode";
  }

  $datecond = "";
  if (!empty($asondate)){
    $datecond =  "AND `vouchdt` <= $asondate";
  }

  $get = mysql_query("SELECT `source`,`vouchdt`, `itemcode`, `itemname`, `color`, `itemgrp`, `s5`, `s6`, `s7`,`s8`, `s9`, `s10`, `s11`, `s12`, `soth`, `qty`, `mrp`, `rate`  FROM `transacn` WHERE $groupcond $datecond GROUP BY itemname ") or die(mysql_error());


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
          <form role="form" name="imageview" method="GET" action="imgview.php">
            <div>
              <img src="upload/default.jpg" class="img-responsive">
            </div>
            <table class="table table-bordered">
              <tr>
                <td>
                  <label>Name</label>
                </td>
                <td>
                  <?php echo "RCF211-1895"; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Colour</label>
                </td>
                <td>
                  <?php echo "B.TAN"; ?>
                </td>
              </tr>
            </table>
            <table class="table table-bordered">
              <tr>
                <td>
                  <label>5</label>
                </td>
                <td>
                  <label>6</label>
                </td>
                <td>
                  <label>7</label>
                </td>
                <td>
                  <label>8</label>
                </td>
                <td>
                  <label>9</label>
                </td>
                <td>
                  <label>10</label>
                </td>
                <td>
                  <label>11</label>
                </td>
                <td>
                  <label>12</label>
                </td>
                <td>
                  <label>Other</label>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo "2"; ?>
                </td>
                <td>
                  <?php echo "1"; ?>
                </td>
                <td>
                  <?php echo "0"; ?>
                </td>
                <td>
                  <?php echo "0"; ?>
                </td>
                <td>
                  <?php echo "1"; ?>
                </td>
                <td>
                  <?php echo "5"; ?>
                </td>
                <td>
                  <?php echo "4"; ?>
                </td>
                <td>
                  <?php echo "6"; ?>
                </td>
                <td>
                  <?php echo "2"; ?>
                </td>
              </tr>

            </table>
            <table class="table table-bordered">
              <tr>
                <td>
                  <label>Cost</label>
                </td>
                <td>
                  <?php echo "250"; ?>
                </td>
                <td>
                  <label>MRP</label>
                </td>
                <td>
                  <?php echo "300"; ?>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>

    </div>
  </body>

</html>
