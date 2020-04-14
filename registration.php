<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <link rel="stylesheet" href="styles/registration.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div id="navBar"></div>
  <div class="content">
    <form class="register" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div id="welcome">
        Welcome!
      </div>
      <div>
        <label>Username</label>
        <input class="inputText" type="text" id="username" name="name" placeholder="Username" auto-focus required>
      </div>
      <div>
        <label>Email</label>
        <input class="inputText" type="email" id="email" name="email" placeholder="Email Address" required>
      </div>
      <div>
        <label>Password</label>
        <input class="inputText" type="password" id="password" name="pwd" placeholder="Password" required>
      </div>
      <button class="btnSubmit" type="submit" value="submit">REGISTER</button>
    </form>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function(){
      $("#navBar").load("navBar.html");
    });
  </script>

  <?php

  function register() {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      //Stuff to interact with database?
      //Not sure what to put here

      header('Location: login.php');

  	}
  }

  register();

  ?>


</body>
</html> 
?>