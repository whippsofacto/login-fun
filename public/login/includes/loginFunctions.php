<?php
  //Define login functions

  //creates a dynamic URL that appropriately redirects the user on login
  function redirect_user($page = 'index.php'){

    //build the dynamic URL
    // url is given http + hostname + current directory
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    //remove any excess slashes
    $url = rtrim($url, '/\\');

    //append the page to the url
    $url .= '/' . $page;

    //Redirect
    header("Location: $url");

    //exit the script
    exit();
  }

  // Validate the form data
  function check_login ($dbc, $email = '', $pass = ''){

    //create an array to catch any errors
    $errors = array();

    //Check for an email address
    if (empty($email)){
      $errors[] = "Please enter a valid email address.";
    } else {
      $e = mysqli_real_escape_string($dbc, trim($email));
    }

    //Check for a password
    if (empty($pass)){
      $errors[] = "Please enter your password.";
    } else {
      $p = mysqli_real_escape_string($dbc, trim($pass));
    }

    //If the errors array remains empty
    if (empty($errors)){
      //define the query
      $query  = "SELECT user_id, first_name FROM users WHERE email='$e' AND pass=SHA1('$p')";
      //store the query in the run var
      $run = mysqli_query($dbc, $query);

      //Check for results

      //if the number of matches is == 1
      if (mysqli_num_rows($run) == 1){

          //get the record
          $row = mysqli_fetch_array($run, MYSQLI_ASSOC);

          //return the record
          return array(true, $row);

        } else {
          //if there is no match
          $errors[] = "The email address or password could not be found.";
        }
      }

      //return errors{
      return array(false, $errors);
    }
