<?php
    session_start();
    $cookie_name = 'nome_usuario';
    unset($_COOKIE[$cookie_name]);
    // empty value and expiration one hour before
    $res = setcookie($cookie_name, '', time() - 3600);
    session_destroy();
    header("Location: index.php");
 
?>