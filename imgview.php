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

?>

<html>
  <head>
    <title>Image stock</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/idangerous.swiper.css">
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/idangerous.swiper-2.1.min.js"></script>
    <style type="text/css">

      .swiper-container {
        color: #111;
        text-align: center;
      }

      .swiper-wrapper{
        height: 1700px !important;
      }

      /*.row {
        padding: 30px 40px;
        border-radius: 20px;
        background: #918A8A;
        border: 3px solid white;
        position: relative;
        box-shadow: 0px 0px 5px #000;
      }*/
      .row{
        background: #918A8A;
      }

      .content-slide {
        padding: 20px;
        color: #fff;
      }
      .title {
        font-size: 25px;
        margin-bottom: 10px;
      }
      .pagination {
        position: absolute;
        left: 0;
        text-align: center;
        bottom:5px;
        width: 100%;
      }
      .swiper-pagination-switch {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 10px;
        background: #999;
        box-shadow: 0px 1px 2px #555 inset;
        margin: 0 3px;
        cursor: pointer;
      }
      .swiper-active-switch {
        background: #fff;
      }

      .container .row #arrows .arrow-left {
        background: url(img/arrows.png) no-repeat left top;
        position: absolute;
        left: 0px;
        top: 20%;
        margin-top: -15px;
        width: 17px;
        height: 30px;
      }
      .container .row #arrows .arrow-right {
        background: url(img/arrows.png) no-repeat left bottom;
        position: absolute;
        right: 0px;
        top: 20%;
        margin-top: -15px;
        width: 17px;
        height: 30px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div id="arrows" class="col-md-offset-3 col-md-6 col-md-offset-3" >
          <a class="arrow-left" href="#"></a>
          <a class="arrow-right" href="#"></a>
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <?php
                $itemqry = mysql_query("SELECT * FROM `item`") or die(mysql_error());
                $allitems = array();
                $allcolor = array();
                while ($itemresult = mysql_fetch_assoc($itemqry)) {
                  $allitems = $itemresult;
                  $itemname = $allitems['name'];
                  $colorqry = mysql_query("SELECT * FROM `color`") or die(mysql_error());
                  while ($colresult = mysql_fetch_assoc($colorqry)) {
                    $colorname = $colresult['name'];
                    $colorcode = $colresult['code'];
                    $sizeqry = mysql_query("SELECT `source`,`vouchdt`, `itemcode`, `itemname`, `color`, `itemgrp`, SUM(s5) as s5, SUM(s6) as s6, SUM(s7) as s7, SUM(s8) as s8, SUM(s9) as s9, SUM(s10) as s10, SUM(s11) as s11, SUM(s12) as s12, SUM(soth) as soth, `qty`, `mrp`, `rate`  FROM `transacn` WHERE `itemname` = '$itemname' AND `color` = '$colorcode' $groupcond $datecond GROUP BY itemname ") or die(mysql_error());
                    while ($result = mysql_fetch_assoc($sizeqry)) {
                    ?>
                      <div class="swiper-slide">
                        <div>
                          <?php echo "<img src='".$allitems['imgpath']."' class='img-responsive'>"; ?>
                        </div>
                        <table class="table table-bordered">
                          <tr>
                            <td>
                              <label>Item name</label>
                            </td>
                            <td>
                              <?php
                                echo $result['itemname'];
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label>Colour</label>
                            </td>
                            <td>
                              <?php echo $colorname; ?>
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
                              <?php echo $result['s5']; ?>
                            </td>
                            <td>
                              <?php echo $result['s6']; ?>
                            </td>
                            <td>
                              <?php echo $result['s7']; ?>
                            </td>
                            <td>
                              <?php echo $result['s8']; ?>
                            </td>
                            <td>
                              <?php echo $result['s9']; ?>
                            </td>
                            <td>
                              <?php echo $result['s10']; ?>
                            </td>
                            <td>
                              <?php echo $result['s11']; ?>
                            </td>
                            <td>
                              <?php echo $result['s12']; ?>
                            </td>
                            <td>
                              <?php echo $result['soth']; ?>
                            </td>
                          </tr>

                        </table>
                        <table class="table table-bordered">
                          <tr>
                            <td>
                              <label>Cost</label>
                            </td>
                            <td>
                              <?php echo $result['rate']; ?>
                            </td>
                            <td>
                              <label>MRP</label>
                            </td>
                            <td>
                              <?php echo $result['mrp']; ?>
                            </td>
                          </tr>
                        </table>
                      </div>
                  <?php
                    }
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">

      var mySwiper = new Swiper('.swiper-container',{
        loop:true
      })
      $('.arrow-left').on('click', function(e){
        e.preventDefault()
        mySwiper.swipePrev()
      })
      $('.arrow-right').on('click', function(e){
        e.preventDefault()
        mySwiper.swipeNext()
      })

    </script>
  </body>

</html>
