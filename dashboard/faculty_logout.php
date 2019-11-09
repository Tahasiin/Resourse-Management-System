<?php

session_start();
unset($_SESSION["member_username"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
session_unset();
session_destroy();
header("Location: ../login/faculty.php");

?>
