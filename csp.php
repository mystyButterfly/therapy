<?php
session_set_cookie_params([
    'lifetime' => 15778476, //6month
    'path' => '/',
    'domain' => 'mydomain.com',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
?>