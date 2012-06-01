<?php
include 'include/mail_to.php';
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
    
if (!preg_match("/[(@)]/", $email)){
?>
<script language="javascript" type="text/javascript">
alert('Proszę wprowadzić poprawnie adres email.');
window.location = 'kontakt.php';
</script>
<?php }else{ 
if (strlen($name) < 4){
?>
<script language="javascript" type="text/javascript">
alert('Wypełnij pole imie.');
window.location = 'kontakt.php';
</script>
<?php }else{ 
if (strlen($message) < 16){
?>
<script language="javascript" type="text/javascript">
alert('Wprowadź w wiadomości więcej niż 16 znaków.');
window.location = 'kontakt.php';
</script>
<?php }else{
$mail_status = mail($mail_to, "Pytanie klienta.", $message, $email);
if ($mail_status) { ?>
<script language="javascript" type="text/javascript">
alert('Wiadomość została wysłana.');
window.location = 'kontakt.php';
</script>
<?php }else{ ?>
<script language="javascript" type="text/javascript">
alert('Wiadomość nie została wysłana.');
window.location = 'kontakt.php';
</script>
<?php
}
}
}
}
?>