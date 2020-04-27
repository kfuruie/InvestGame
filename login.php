<!DOCTYPE html>

<?php if (isset($_SESSION['user'])) { session_destroy(); } ?>
<?php session_start();?>

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
        <input class="inputText" type="text" id="username" name="name" placeholder="Username" autofocus required>
      </div>
      <div>
        <label>Password</label>
        <input class="inputText" type="password" id="password" name="pwd" placeholder="Password" required>
      </div>
      <button class="btnSubmit" type="submit" name="login">LOGIN</button>
      <button onclick="window.location.href = 'registration.php';" class="btnSubmit">REGISTER</button>
    </div>

  <?php

  function authenticate() {

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
      if(strlen($_POST['name']) > 0) {
        $user = trim($_POST['name']);

        if (!ctype_alnum($user)) {
          echo "Username must be alphanumeric only! </br>";
          //reject('name');
        }
        else {
          $pwd = htmlspecialchars($_POST['pwd']);
          $hash = password_hash($pwd, PASSWORD_BCRYPT);

          if (password_verify($pwd, $hash)){
            $_SESSION['user'] = $user;
            header('Location: hhtp://localhost:4200/');
          }
          else
            echo "Username and password combination not found! </br>";
          }
        }
      }
  }

  authenticate();

  ?>

  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function(){
      $("#navBar").load("navBar.html");
    });

  </script>

</body>