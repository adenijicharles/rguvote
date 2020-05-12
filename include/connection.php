<?php

require "constants.php";

$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);//holds the server credentials

if((!$connect) || !mysqli_select_db($connect, DB_NAME)) {//if the variables are not set OR it is not connecting to the specified database, flag an error
    die("unable to connect");
}

//@ removes mysql errors jargons and makes the error debugging easy to understand and intuitive
?>