<?php

include './autoloader.php';

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$s = new Session('s');

echo '<h3>OK!</h3>';