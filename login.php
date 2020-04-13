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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function(){
      $("#navBar").load("navBar.html");
    });
  </script>

</body>