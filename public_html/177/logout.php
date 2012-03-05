<?php
session_start();
 if(!isset($_SESSION['login'])) {
 $komunikat = "Nie by³e¶ zalogowany!!!";
}

 else{
 unset($_SESSION['login']);
 header("Location: index.php");
}

session_destroy();
?>

<html>
<head>
</head>
<body>
<?php echo $komunikat ?>
</body>
</html>