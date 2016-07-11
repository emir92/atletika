<?php
   session_start();
   unset($_SESSION["user-name"]);
   unset($_SESSION["password"]);
   header('Refresh:1; URL = index.php');
?>