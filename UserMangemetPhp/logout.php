<?php
session_start();
session_destroy();

// قم بتوجيه المستخدم إلى صفحة تسجيل الدخول بعد تسجيل الخروج
header("Location: login.php");
exit();
?>
