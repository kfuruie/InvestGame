<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="author" content="krf3tb">
  <meta name="author" content="dbl3jf">
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="styles/login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div id="navBar"></div>
  <div class="content">
    <form class="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div id="title">Login</div>
      <div>
        <label>Username</label>
        <input class="inputText" type="text" id="username" name="name" placeholder="Username" auto-focus required>
      </div>
      <div>
        <label>Password</label>
        <input class="inputText" type="password" id="password" name="pwd" placeholder="Password" required>
      </div>
      <button class="btnSubmit" type="submit">LOGIN</button>
      <button onclick="window.location.href = 'registration.php';" class="btnSubmit" type="submit">REGISTER</button>
    </div>

  </div>


  <?php session_start();?>

  <?php

  function authenticate() {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $user = trim($_POST['name']);
      $_SESSION['user'] = $user;
      header('Location: tradingCenter.php');
    }

    /*global $mainpage;

    if (($_SERVER['REQUEST_METHOD'] == "POST") && (strlen($_POST['name']) > 0)) {
      $user = trim($_POST['name']);

      if (!ctype_alnum($user)) {
        reject('name');
      }

      if (isset($_POST['pwd'])) {
        $pwd = trim($_POST['pwd']);
        $pwd = htmlspecialchars($pwd);

        if (!ctype_alnum($pwd)) {
          reject('password');
        }

        else {
          $_SESSION['user'] = $user;
          $hash_pwd = password_hash($pwd, PASSWORD_BCRYPT);
          $_SESSION['pwd'] = $hash_pwd;
          header('Location: tradingCenter.php');
        }
      }
    }*/
  }

  authenticate();

  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function(){
      $("#navBar").load("navBar.html");
    });

    /*function validate() {

      let alertUser = document.getElementById("userAlert");
      let alertPass = document.getElementById("passAlert");

      if (document.getElementById("username").value == "") {
        alertUser.style.display = "block";
      }
      else {
        alertUser.style.display = "none";
      }

      if (document.getElementById("password").value == "") {
        alertPass.style.display = "block";
      }
      else {
        alertPass.style.display = "none";
      }

      if (document.getElementById("username").value != "" && document.getElementById("password").value != "") {
        window.location.href = 'tradingCenter.html';
      }
    }*/
  </script>

</body>