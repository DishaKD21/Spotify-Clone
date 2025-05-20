<?php
include './db.php';
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    register($email, $password);
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    login($email, $password);
}

function alert($msg, $redirect)
{
    echo "<script type='text/javascript'>alert('$msg');window.location.href='$redirect';</script>";
}

function login($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['loggedin'] = true;
            alert("Login Succesfull", "dashboard.php");
        } else {
            alert("Password Is Incorrect", "login.php");
        }
    } else {
        alert("email Doesn't Exists", "login.php");
    }
}


function register($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) < 1) {
        $sql = "INSERT INTO users ( `email`, `password`) VALUES ( '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['loggedin'] = true;
            alert("Registered", "dashboard.php");
        } else {
            alert("Something went wrong!", "Sign_up.php");
        }
    } else {
        alert("Email already used!", "Sign_up.php");
    }
}