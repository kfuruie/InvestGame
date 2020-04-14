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
        <input class="inputText" type="text" id="username" name="name" placeholder="Username" required>
        <div class="alert" id="userAlert">Please provide a name</div>
      </div>
      <div>
        <label>Email</label>
        <input class="inputText" type="email" id="email" name="email" placeholder="Email Address" required>
        <div class="alert" id="emailAlert">Please provide an email address</div>
        <div class="alert" id="emailRegexAlert">Please provide a valid email address</div>
      </div>
      <div>
        <label>Password</label>
        <input class="inputText" type="password" id="password" name="pwd" placeholder="Password" required>
        <div class="alert" id="passAlert">Please provide a password</div>
      </div>
      <button onclick=validate() class="btnSubmit" type="submit">REGISTER</button>
    </form>
  </div>


  <?php 
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['name']) && !empty($_GET['email']) && !empty($_GET['pwd'])) {
      echo "The POST request works! <br/>";
    }
  }

  ?>
  
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function(){
      $("#navBar").load("navBar.html");
    });

    function validate() {

      let alertUser = document.getElementById("userAlert");
      let alertPass = document.getElementById("passAlert");
      let alertEmail = document.getElementById("emailAlert");
      let alertEmailRegex = document.getElementById("emailRegexAlert");

      let emailInput = document.getElementById("email").value;
      let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_'{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

      if (document.getElementById("username").value == "") {
        alertUser.style.display = "block";
      }
      else {
        alertUser.style.display = "none";
      }

      if (document.getElementById("email").value == "") {
        alertEmail.style.display = "block";
      }
      else {
        alertEmail.style.display = "none";
      }
     
       if (!emailInput.match(emailRegex)) {
        alertEmailRegex.style.display = "block";
      }
      else {
        alertEmailRegex.style.display = "none";
      }

      if (document.getElementById("password").value == "") {
        alertPass.style.display = "block";
      }
      else {
        alertPass.style.display = "none";
      }


      if (document.getElementById("username").value != "" && document.getElementById("password").value != "" && document.getElementById("email").value.match(emailRegex) && document.getElementById("email").value != "") {
        window.location.href = 'tradingCenter.html';
      }
    }
  </script>-->

</body>