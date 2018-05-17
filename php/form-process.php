<?php

$errorMSG = "";

// NAME
if (empty($_POST["usuario"])) {
    $errorMSG = "Name is required ";
} else {
    $usuario = $_POST["usuario"];
}

// EMAIL
if (empty($_POST["password"])) {
    $errorMSG .= "password is required ";
} else {
    $password = $_POST["password"];
}



// redirect to success page
if ($errorMSG == "") {
    if ($usuario == "Admin" && $password == "q2w3e4") {
        // Start the session
        session_start();
        // Set session variables
        $_SESSION["name"] = $usuario;
        $_SESSION['loggedin'] = true;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
        echo "success";
    } else {
        echo 'Usuario o Password incorrecto';
    }
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>