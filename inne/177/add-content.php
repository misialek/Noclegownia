<?php
include '../_class/cms_class.php';

$obj = new moderncms();

//setup our connection vars
$obj->host ='localhost';
$obj->username ='root';
$obj->password ='';
$obj->db ='moderncms';

//connect to db
$obj->connect();
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset="utf-8" >
  <meta name="Description" content=" [wstaw tu opis strony] ">
  <meta name="Keywords" content=" [wstaw tu slowa kluczowe] ">
  <meta name="Author" content=" [dane autora] ">
  <meta name="Generator" content="kED2">

  <title> e-spowiedz</title>

  <link rel="stylesheet" href="../style.css" type="text/css" media="screen"  charset="utf-8">
</head>
<body>

<div id="page-wrap">

<?php include 'nav.php';?>

<form method="post" action="index.php">

<input type="hidden" name="add" value="true" />

<div>
<label for="title">Title:</label>
<input type="text" name="title" id="title" />
</div>

<div>
<label for="body">Body:</label>
<textarea name="body" id="body" rows="8" cols="40"></textarea>
</div>

<input type="submit" name="submit" value="Add content"/>
</form>
	
</div>
</body>
</html>
