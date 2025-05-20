<?php
session_start();
session_destroy();

// Clear all cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach ($cookies as $cookie) {
        $parts = explode('=', $cookie, 2);
        $name = trim($parts[0]);
        // Expire the cookie
        setcookie($name, '', time() - 3600, '/');
    }
}

// Redirect to index
header('Location: index.php');
exit;
?>
