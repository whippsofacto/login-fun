<?php

//Establishes connection to the database


//set creds as constants preventing them from being changed
DEFINE('DB_USER', 'username');
DEFINE('DB_PASSWORD', 'password');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'dogfish_user');


//Make the connection
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ("Couldn't connect!" . mysqli_connect_error());

//Encoding
mysqli_set_charset($dbc,'utf-8');
