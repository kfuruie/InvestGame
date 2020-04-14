<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="styles/login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div id="navBar"></div>
  <div class="content">
    <div class="login">
      <div id="title">Login</div>
      <div>
        <label>Username</label>
        <input class="inputText" type="text" id="username" placeholder="Username">
      </div>
      <div>
        <label>Password</label>
        <input class="inputText" type="password" id="password" placeholder="Password">
      </div>
      <button onclick=validate() class="btnSubmit" type="submit">LOGIN</button>
      <button onclick="window.location.href = 'registration.php';" class="btnSubmit" type="submit">REGISTER</button>
    </div>
  </div>

  <?php session_start();?>

  <?php

  function authenticate() {
    global $mainpage;

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
    }

  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function(){
      $("#navBar").load("navBar.html");
    });
  </script>

</body>