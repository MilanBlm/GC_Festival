<?php
function registerUser($firstName, $lastName, $email, $password) {
    $result = db_insertData("INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')");
    return $result;
}

function getUser($email, $password) {
    $user = db_getData("SELECT * FROM users WHERE email='$email' AND password='$password'");
    if ($user->num_rows > 0){
        return $user;
    } else {
        return "No user found";
    }
}
?>
