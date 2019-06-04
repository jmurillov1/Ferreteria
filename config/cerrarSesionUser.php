<?php
 session_start();
 $_SESSION['isUser'] = FALSE;
 session_destroy();
 header("Location: /github/Ferreteria/public/vista/login.html");
?>