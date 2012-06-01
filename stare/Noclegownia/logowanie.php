<link rel="stylesheet" href="css/style2.css" type="text/css" media="all">
<center>
     <b><h1>LOGOWANIE</h1></b><br /><br /><br /><br /><br />
<table id="regi" style="color:#ccc;margin:0 0 0 30px" border="0">
     <form action="log.php" method="post" onSubmit="parent.closeColorbox();">
    <input type="hidden" name="wyslane" value="TRUE" />
    Login: <br><input type="text" name="login" /><br><br>
    Hasło: <br><input type="password" name="haslo" /><br /><br />
    <input type="submit" value="zaloguj" onclick="parent.reloadURL()" /><br>
    </form>
</center>