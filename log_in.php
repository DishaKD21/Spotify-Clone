<?php

include './db.php';

if (isset($_SESSION['loggedin'])) {
    header("Location: dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="utility.css">
    <link rel="icon" type="image/x-icon" href="svg/spotifylogsign.svg">
    <title>Login_Spotify</title>
</head>

<body class="back-shad">
    <div class="back-box">
        <div class="box">
            <div class="content">
                <div>
                    <img class="invert" src="svg/spotifylogsign.svg" alt="">
                    <h1>Log in to Spotify</h1>
                </div>

                <a class="button" href="">
                    <img class="svglog" src="svg/google.svg" alt="Google Logo">
                    <h5>Continue with Google</h5>
                </a>

                <a class="button" href="">
                    <img class="svglog" src="svg/facebook.svg" alt="Facebook Logo">
                    <h5>Continue with Facebook</h5>
                </a>

                <a class="button" href="">
                    <img class="svglog invert" src="svg/apple.svg" alt="Apple Logo">
                    <h5>Continue with Apple</h5>
                </a>

                <a class="button" href="">
                    <h5>Continue with phone number</h5>
                </a>
            

            <hr>
            <form action="loading.php" method="POST" class="flexcolumn">
            <input type="hidden" name="login" value="1">
    <label for="email">Email or username</label>
    <input type="email" name="email" placeholder="Email or username" required>

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" required>

    <button class="btn" type="submit">Login</button>
</form>
            <div>
                <span>Don't have an account?<a href="Sign_up.php" style="color: rgb(223, 223, 223);">Sign up for Spotify</a></span>
            </div>
        </div>
        </div>
    </div>

    <footer>
        <p>This site is protected by reCAPTCHA and the Google <a
                href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Privacy
                Policy</a> and <a href="https://policies.google.com/terms" target="_blank"
                rel="noopener noreferrer">Terms of Service</a> apply.</p>
    </footer>
</body>

</html>