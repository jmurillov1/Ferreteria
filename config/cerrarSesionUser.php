<?php
 session_start();
 $_SESSION['isUser'] = FALSE;
 session_destroy();
 header("Location: /Ferretería/public/vista/login.html");
?>