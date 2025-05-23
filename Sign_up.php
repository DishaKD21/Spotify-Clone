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
  <title>Sign_up-Spotify</title>
</head>

<body class="back-shad">
  <div class="back-boxsignup">
    <div class="boxsignup">
      <div class="content">
        <div>
          <img class="invert" src="svg/spotifylogsign.svg" alt="">
          <h1>Sign up to start listening</h1>
        </div>

        <form action="loading.php" method="POST" class="flexcolumn">
          <input type="hidden" name="register" value="1">
          <span>Email address</span>
          <input type="email" name="email" placeholder="name@domain.com" required>

          <span>Password</span>
          <input type="password" name="password" placeholder="Enter your password" required>

          <span><a href="#">Use phone number instead</a></span><br>

          <button class="btn" type="submit">Next</button>
        </form>
       

        <div class="separator">or</div>

        <a class="button" href="#">
          <img class="svglog" src="svg/google.svg" alt="Google Logo">
          <h5>Continue with Google</h5>
        </a>

        <a class="button" href="#">
          <img class="svglog" src="svg/facebook.svg" alt="Facebook Logo">
          <h5>Continue with Facebook</h5>
        </a>

        <a class="button" href="#">
          <img class="svglog invert" src="svg/apple.svg" alt="Apple Logo">
          <h5>Continue with Apple</h5>
        </a>

        <hr>
        <span>Already have an account? 
          <a href="log_in.php" style="color: rgb(243, 243, 243); margin-bottom: 15px;">Login here</a>
        </span>
      </div>
    </div>

    <footer class="footersign">
      <p class="encore-text encore-text-marginal" data-encore-id="text">
        This site is protected by reCAPTCHA and the Google
        <br><a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and 
        <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer">Terms of Service</a> apply.
      </p>
    </footer>
  </div>
</body>
</html>