<!DOCTYPE html>

<?php session_start();?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Trading Center</title>
  <link rel="stylesheet" href="styles/tradingCenter.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php 
    if (isset($_SESSION['user'])) {
  ?>

  <div id="navBar"></div>
  <form class="content" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="tradingCenter">
      <div class="heading">
      	<div class="dummy"></div>
        <div class="title">Trading Center</div>
        <div class="button sort">Sort By</div>
      </div>

      <div class="entry">
        <div class="entryContainer">
          <div class="descriptor">
            <div class="name">Fury Investments</div>
            <div class="button details">More Details</div>
          </div>
          <div class="price">
            <div class="priceDesc">Price Per Share: $<span id="entry1Price">10</span></div>
            <input type="number" id="entry1Input" name="fury" min="0" max="99"/>
          </div>
          <div class="totalPrice">
            <div class="totalDesc">Total: $<span id="entry1Total"></span></div>
          </div>
        </div>
        <input type="checkbox" class="checkbox" id="entry1Check" onclick=updateTotal(this) id="entry1Price">
      </div>

      <div class="entry">
        <div class="entryContainer">
          <div class="descriptor">
            <div class="name">Le Holdings</div>
            <div class="button details">More Details</div>
          </div>
          <div class="price">
            <div class="priceDesc">Price Per Share: $<span id="entry2Price">20</span></div>
            <input type="number" id="entry2Input" name="le" min="0" max="99"/>
          </div>
          <div class="totalPrice">
            <div class="totalDesc">Total: $<span id="entry2Total"></span></div>
          </div>
        </div>
        <input type="checkbox" class="checkbox" id="entry2Check" onclick=updateTotal(this) id="entry2Price">
      </div>


      <div class="confirmation">
      	<div class="total">Total: $<span id="total">0</span></div>
      	<button class="confirm" type="submit" name="confirm">Confirm Order</button>
      </div>

    </div>
  </div>

  <?php
    }
    else {
      header('Location: login.php');
    }
  ?>

  <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['confirm'])) {
      if (($_POST['fury'] >= 0) && _($_POST['le'] >= 0)) {

        $furyShares = $_POST['fury'];
        $leShares = $_POST['le'];

        setcookie("fury", $furyShares, time() + (86400 * 30), "/");
        setcookie("le", $leShares, time() + (86400 * 30), "/");

        header('Location: portfolio.php');
      }
    }
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    var total = 0;

    $(function(){
      $("#navBar").load("navBar.php");
    });

    function updateTotal(checkID) {

      let id = updateTotal.caller.arguments[0].target.id;
      let checkBox = document.getElementById(id);

      if (checkBox.checked == true) {

        if (id == "entry1Check") {

          let basePrice = document.getElementById("entry1Price").innerHTML;
          let numberShares = document.getElementById("entry1Input").value;
          let total = basePrice * numberShares;

          document.getElementById("entry1Total").innerHTML = total;
        }

        if (id == "entry2Check") {

          let basePrice = document.getElementById("entry2Price").innerHTML;
          let numberShares = document.getElementById("entry2Input").value;
          //let total = basePrice * numberShares;

          //Anonymous Function//
          let total = function(basePrice, numberShares){return basePrice * numberShares};
          var res = total(basePrice, numberShares);

          document.getElementById("entry2Total").innerHTML = res;

          console.log(res);
        }
      }

      let entry1 = document.getElementById("entry1Total").innerHTML;
      let entry2 = document.getElementById("entry2Total").innerHTML

      //Arrow Function//
      total = (x, y) => eval(x) + eval(y);
      //let total = eval(entry1) + eval(entry2);
      document.getElementById("total").innerHTML = total(entry1, entry2);
    }

  </script>

</body>
</html>