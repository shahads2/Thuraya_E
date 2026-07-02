<?php
session_start(); //. عشان PHP يعرف أي Session بنحذفها
session_unset(); //. يمسح كل المتغيرات داخل السيشن
session_destroy(); // يقتل السيشن نفسها

header("Location: Newhome.php");
exit();
?>
