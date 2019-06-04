<?php
 session_start();
 $_SESSION['isAdmin'] = FALSE;
 session_destroy();
 header("Location: /Ferreteria/public/vista/login.html");
?>