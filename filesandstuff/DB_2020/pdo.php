<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bclub', 'localusername', 'localuserpassword');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>