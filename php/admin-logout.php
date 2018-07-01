<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01/07/2018
 * Time: 07:21
 */

session_start();
unset($_SESSION['username']);
session_destroy();

header("url=.../php/login.php");
exit;
?>