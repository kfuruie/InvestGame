<!DOCTYPE html>

<?php session_start();?>

<html lang="en">

<head>
  <meta name="author" content="krf3tb">
  <meta name="author" content="dbl3jf">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/navBar.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Navigation Bar</title>
  
</head>
  
  <div class="uberHeader">
    <div class="searchbar">
      <form>
        <input type="text" placeholder="Search" name="search" size="50" maxlength="50">
        <button type="submit">SEARCH</button>
      </form>
    </div>
    <!--<div class="profile">
      <div class="username">
        <?php if (isset($_SESSION['user'])) {
          echo $_SESSION['user'];
        } else {
          echo "New User";
        }
        ?>
      </div>
      <?php if (isset($_SESSION['user'])) { ?>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <button type="submit" name="logout">LOGOUT</button>
      </form>
      <?php } else ?>
    </div>-->
  </div>

  <div class="header">
    <div class="navButtons" id="menu">
      <a href="#" class="navButton icon" onclick="hamburger()">
      <i class="fa fa-bars"></i>
      </a>
      <a class="navButton" href="">HOME</a> <!--Fix my link later -->
      <a class="navButton" href="tradingCenter.php">LISTINGS</a>
      <a class="navButton" href="portfolio.php">PORTFOLIO</a>
      <a class="navButton" href="about.html">ABOUT</a>
    </div>
  </div>

  <!--<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
        session_destroy();
        header('Location: login.php');
    }
  ?>-->

<script>
  function hamburger(){
    var n = document.getElementById("menu");
    if(n.className === "navButtons"){
      n.className += ".burger";
    }
    else{
      n.className = "navButtons";
      var hideMe = document.getElementByClassName("fa");
      hideMe.style.display ="none";
    }
  }
</script>
</html>