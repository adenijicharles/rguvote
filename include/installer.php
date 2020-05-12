<?php
//AN INSTALLER CREATES TABLES IN OUR DATABASE

require "connection.php";


$voters = "CREATE TABLE IF NOT EXISTS voters (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    surname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
)";




$tables = array($voters); //This is only necessary when creating more than one table

foreach ($tables as $table=>$sql) {
    $query = mysqli_query($connect,$sql);
    
    if ($query) {
        echo "Table was successfully created <br>";

    } else {
        echo "Table creation failed";
    }
}

?>