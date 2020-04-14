<?php 
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['name']) && !empty($_GET['email']) && !empty($_GET['pwd'])) {
      echo "The POST request works! <br/>";
    }
  }
?>