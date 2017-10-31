<?php

//if there is no cookie redirect:
if (!isset($_COOKIE['user_id'])){

  require('includes/loginFunctions.php');
  redirect_user();

} else {

  //Delete cookies (replace with empty)
  setcookie('user_id', '', time()-1800, '/', '', 0,0);
  setcookie('first_name', '', time()-1800, '/', '', 0,0);
}

$page_title='dogFish -- Logged Out!';

include('includes/header.php');
echo "<div class=\"text-center\">
        <img class='logo img-fluid' src='./imgs/mobile.png' alt=\"graphic of a smarphone held horizontally against a white background\"/>
        </div>";
echo "<h1 class=\"center\"><a href=\"index.php\"> Welcome to Dogfish </a></h1>";
echo "<h2 class=\"center\"> Logged Out! </h2>";
?>

<h3> Login </h3>
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="email">Email Address: </label>
        <input class="form-control form-control-lg" id="email" type="text" name="email" size="20" maxlength="60"/>
      </div>
      <div class="form-group">
       <label for="password"> Password: </label>
       <input class="form-control form-control-lg" id="password" type="password" name="pass" size="20" maxlength="20" />
      </div>
      <div class="form-group">
        <input class="btn-primary btn btn-outline-dark hover" type="submit" name="submit" value="Login"/>
      </div>
    </form>

<?php
include('includes/footer.php');
?>
