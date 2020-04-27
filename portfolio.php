<!DOCTYPE html>

<?php session_start();
  require("dbcommands.php");
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Portfolio</title>
  <link rel="stylesheet" href="styles/portfolio.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php
    if (isset($_SESSION['user'])) {
  ?>

  <div id="navBar"></div>
  <div class="content">
    <div class="total"> <?php if (isset($_SESSION['user'])) {
      if (/*isset($_COOKIE["fury"]) && */(isset($_COOKIE["le"]))) {
        $numshares = getShares_by_id($_SESSION['user']);
        $net = ($numshares[0] * 10) + ($_COOKIE["le"] * 20);
        echo $_SESSION['user'] . "'s Net Worth: $" . $net . ".00"; 
      }
    }?>
    </div>
    <div class="investments">

      <div class="labels">
        <div>Entity</div>
        <div>Shares</div>
        <div>Value</div>
        <div>Daily Gain/Loss</div>
        <div>Buy/Sell</div>
      </div>

      <div class="entry">
        <div class="entity">Fury Investments</div>
        <div class="shares">
        <?php
          
          $numshares = getShares_by_id($_SESSION['user']);
          echo $numshares[0] . " shares"; ?>
        </div>
        <div class="value">
          <?php
            //require("dbcommands.php");
            $numshares = getShares_by_id($_SESSION['user']);
            $value = $numshares[0] * 10;
            echo "$" . $value . ".00";
          ?>
        </div>
        <div class="dailyChange">-2.16%</div>
        <div class="buySell">
          <div class="radioContainer">
            <span>Buy</span><input name="group1" type="radio">
            <span>Sell</span><input name="group1" type="radio">
          </div>
          <div class="amountContainer">
            <div>Amount</div>
            <input type="amount" min="0" max="99"/>
          </div>
        </div>
      </div>

      <div class="entry">
        <div class="entity">Le Holdings</div>
        <div class="shares">
          <?php if(isset($_COOKIE["le"])) echo $_COOKIE["le"] . " shares"; ?>
        </div>
        <div class="value">
          <?php if(isset($_COOKIE["fury"])) {
            $value = $_COOKIE["le"] * 20;
            echo "$" . $value . ".00";
          }?>
        </div>
        <div class="dailyChange">+6.73%</div>
        <div class="buySell">
          <div class="radioContainer">
            <span>Buy</span><input name="group2" type="radio">
            <span>Sell</span><input name="group2" type="radio">
          </div>
          <div class="amountContainer">
            <div>Amount</div>
            <input type="amount" min="0" max="99"/>
          </div>
        </div>
      </div>

      <button class="confirm">Confirm Order</button>

    </div>
  </div>

  <?php
    }
    else {
      header('Location: login.php');
    }
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function(){
      $("#navBar").load("navBar.html");
    });
  </script>

</body>
</html>