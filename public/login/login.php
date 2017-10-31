<?php
// processes the login form submission
//if login is successful - redirect the user to:

//check if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  //require the login functions
  require("includes/loginFunctions.php");

  //require the db connection
  require("../db_connect.php");

  // check the login
  list($check, $data) = check_login($dbc,
            strip_tags($_POST['email']),
            strip_tags($_POST['pass']));

  //if check is passed
  if($check){
    //Set cookies to expire after 30mins
    setcookie('user_id',$data['user_id'],time()+1800,'/','',0,0);
    setcookie('first_name',$data['first_name'],time()+1800,'/','',0,0);

    //Direct user to
    redirect_user('loggedin.php');

    //if check is not passed
  } else {

    //pass the $data var to the $errors arr
    $errors = $data;
  }

  //close DB connection
  mysqli_close($dbc);

}

//Create the page
include('index.php');
