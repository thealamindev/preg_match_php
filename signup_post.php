<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$preg_maa = preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password);



if ($name) {
    if (ctype_alpha($name)) {
        echo "Your Name is " . $name . "<br>";
        $_SESSION['old_name'] = $name;
    } else {
        $_SESSION['name_error'] = "Name Is Invalid!";
    }
} else {
    $_SESSION['name_error'] = "Name Is Required!";
}



if ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Your Email is " . $email . "<br>";
        $_SESSION['old_email'] = $email;
    } else {
        $_SESSION['email_error'] = "Email Format Not Valid!";
    }
} else {
    $_SESSION['email_error'] = "Email Is Required!";
}



if ($password) {
    if (strlen($password < 8)) {
        echo "Your Password is " . $password . "<br>";
    } else {
        $_SESSION['password_error'] = "Password Short!";
    }
} else {
    $_SESSION['password_error'] = "Password Is Required!";
}



if ($confirm_password) {
    echo "Your Con Pass is " . $confirm_password . "<br>";
} else {
    $_SESSION['confirm_password_error'] = "Confirm Password Is Required!";
}

// Confirm Password Pregmatch

if ($password != $confirm_password) {
    $_SESSION['password_error'] = "Password & Confirm Password Not Matched";
} else {
    if ($preg_maa != 1) {
        $_SESSION['password_error'] = "Password  PregMatch";
    }
}
header('location: signup.php');
