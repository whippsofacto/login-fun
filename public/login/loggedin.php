<?php

//redirect the user from login!

if (!isset($_COOKIE['user_id'])){

    require('includes/loginFunctions.php');
    redirect_user();

}

//set page title
$page_title = "dogFish -- Logged in!";
//add header
require("includes/header.php");


echo "<h1> Logged in! </h1>
      <p>
      You are now logged in <span class=\"bold\">{$_COOKIE['first_name']}Fish</span>
      </p>
      <p>
      <a href='logout.php'>Logout</a>
      </p>";

//add the footer
require("includes/footer.php");
