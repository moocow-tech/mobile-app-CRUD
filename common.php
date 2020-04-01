<?php

/*
 *  The following is an interesting look into Cross site request forgery 
 *  (CSRF) attack. This creates a seesion and generates a unique, random token
 *  then we will add a line to each public file that verifes the tokens match before
 *  granting access to the application.
*/
session_start();

if (empty($_SESSION['csrf'])) {
  if (function_exists('random_bytes')) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
  } else if (function_exists('mcrypt_create_iv')) {
    $_SESSION['csrf'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
  } else {
    $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
  }
}
//Escape HTML for output
function escape($html) {
  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
?>