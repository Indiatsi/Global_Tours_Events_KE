<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/06/2018
 * Time: 10:47
 */

session_start();

if (!(array_key_exists("",$_SESSION) AND isset($_SESSION['package_id']))) {
    header("refresh: 0.5; url=../admin-packages.php");
}

unset($_SESSION['username']);
session_destroy();

header("url=../login.html");
exit;
?>