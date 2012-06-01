<?php
if(@$_SESSION['zalogowany']==1){
$login = $_SESSION['login'];
/* rozmiar colorbox dla administratora */
$colorbox_rozmiar=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 10"));
if (mysql_num_rows($colorbox_rozmiar) == 1){ ?>
<script type="text/javascript">
  $(document).ready(function(){
$(".rez").colorbox({iframe:true, width:"1066", height:"600"});
$(".zarz").colorbox({iframe:true, width:"626px", height:"580px"});
$(".pokoj").colorbox({iframe:true, width:"620px", height:"560px"});
$(".user").colorbox({iframe:true, width:"600px", height:"440px"});
$(".pokoje").colorbox({iframe:true, width:"1066", height:"600"});
$(".haslo").colorbox({iframe:true, width:"500px", height:"450px"});
 });
</script>
<?php }
/* rozmiar colorbox dla recepcjonisty */
$colorbox_rozmiar=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 20"));
if (mysql_num_rows($colorbox_rozmiar) == 1){ ?>
<script type="text/javascript">
  $(document).ready(function(){
$(".rez").colorbox({iframe:true, width:"1066", height:"600"});
$(".zarz").colorbox({iframe:true, width:"960", height:"598"});
 });
</script>
<?php }
/* rozmiar colorbox dla klienta */
$colorbox_rozmiar=(mysql_query("SELECT * FROM uzytkownik WHERE login='$login' AND typ_konta = 30"));
if (mysql_num_rows($colorbox_rozmiar) == 1){ ?>
<script type="text/javascript">
  $(document).ready(function(){
$(".rez").colorbox({iframe:true, width:"1100", height:"610"});
$(".zarz").colorbox({iframe:true, width:"600px", height:"520px"});
 });
</script>
<?php }}
/*colorbox dla wszystkich użytkowników */ ?>
<script type="text/javascript">
  $(document).ready(function(){
$(".zlec").colorbox({iframe:true, width:"600px", height:"400px"});
$(".log").colorbox({iframe:true, width:"465px", height:"465px"});
$(".reg").colorbox({iframe:true, width:"465px", height:"490px"});
$(".spr").colorbox({iframe:true, width:"350px", height:"380px"});
 });
</script>