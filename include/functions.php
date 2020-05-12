<?php

function mysql_prep($value) {//to prepare a string to insert into your database; to check if you have the old php version or the new php version
    $magic_quotes_active = get_magic_quotes_gpc();
    $new_enough_php=function_exists("mysql_real_escape_string");

    if($new_enough_php) {
        if($magic_quotes_active) { $value=stripslashes($value); }
        $value = mysql_real_escape_string($value);
    } else {
        if(!$magic_quotes_active) {
            $value = addslashes($value);
        }
    }
    return $value;
}


//my user-defined functions
function check_input($data) {//to prevent sql injections or hacking or inputting html codes
    $data = filter_var ($data, FILTER_SANITIZE_STRING); //removes html tags and special characters like % or url xters
    $data = trim ($data);//trim fn removes trailing and leading white spaces
    $data = stripslashes ($data);//removes slashes
    $data = htmlentities ($data);//remove all other html entities
    return $data;
}

function name_input($data) {
    check_input($data);//invoked check_input
    $data = ucfirst($data);//makes the first letter of the name an uppercase letter
    return $data;
}

function email_input($data) {
    check_input($data);
    return $data;
}

function mysql_inject($input) {
    $input = mysql_real_escape_string($input);
    $input = strtoupper($input);
    return $input;
}

function redirect_to($location=NULL) {
    if(!empty($location)) {
        header("location:$location");
        exit;
    }
}

function check_for_empty_inputs($post_array, $redirect){
    $error = [];
    $_SESSION['form_values'] = $post_array;

    foreach ($post_array as $key => $value) {
        if (empty(trim($value))) {
            $key = ucfirst(str_replace("_", " ", $key)) . " is required <br>";
            array_push($error, $key);
        }
    }
    if (count($error) > 0) {
        $_SESSION['error'] = implode("", $error);
        header("location: ../$redirect");
        die();
    }
}

?>