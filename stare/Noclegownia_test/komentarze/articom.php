<?php
session_start();
include '../db.php';
require('config.php');
require('funkcje.php');
require('jezyki/'.$cf_jezyk);

if(isset($_GET['kom'])){

$html = ''; $mesasge = ''; $pager = '';
$com_name = $jezyk['ac_name'];
$com_comment = $jezyk['ac_comment'];
$com_email = $jezyk['ac_email'];

// Sprawdzenie pliku z danymi
if (is_writable($path_data)) {
 // Przetwarzanie formularza
 if (isset($_POST["start"]) && ($_POST["start"] == 'save')) {
  $name = Zapis($_POST["name"]);
  $email = Zapis($_POST["email"]);
  $id = Zapis($_POST["id"]);
  $comment = Zapis($_POST["comment"]);
  
  if (($name == '') || ($comment == '') || (strlen($comment) < $ch_comment_min) || (strlen($comment) > $ch_comment_max)) {
   $error = 1;
   if ($name == '') {
    $com_name = "<span class=\"ac_span_red\">".$jezyk['ac_com_name']."<span>";
   }
  
   $format = sprintf($jezyk['ac_com_comment'], $ch_comment_min, $ch_comment_max);
   $message  = "<div class=\"ac_com_red\">".$format."</div>";
  }
  
  // Bez bledu - Zapisz
  if (!isset($error)) {
   // Zapis danych do pliku
   if (file_exists($path_data)) {
    $time = time();
	$time = $time + 7200;
   
    if ($email == '') $email = 0;
	$ip ='0';
   
    // Warunek dla pierwszego rekordu
    if (filesize($path_data) == 0) $data = "";
    else $data = "<-#-".$_GET['kom'].">";
    
    // Dane pliku
    $data = $data."$name||$email||$id||$comment||$time||$ip";
    
    // Zapis danych
    $fp = fopen ($path_data, 'a+');
    fwrite ($fp, $data);
    fclose ($fp);
    
    $name = ''; $email = ''; $comment = '';
    
    $format = sprintf($jezyk['ac_com_save'], "<a href=\"".$_SERVER{"PHP_SELF"}."?kom=".$_GET['kom']."\">".$jezyk['ac_refresh']."</a>");
    $message = "<div class=\"ac_com_green\">".$format."</div>";
   }
   else {
    $message = "<div class=\"ac_com_red\">".$jezyk['ac_com_nofile']."</div>";
   }
  }
 }
 else {
  $name = ''; $email = ''; $id = ''; $comment = '';
 }
 
 // Odczyt danych z pliku i pager
 if (file_exists($path_data) && filesize($path_data) > 0) {
  if(isset($_GET['str'])) {
   $page = $_GET['str'];
   $start = ($page-1) * $for_page;
  }
  else {
   $start = 0;
   $page = 1;
  }
  
  $html .= "<div class=\"ac_list\">\n";
 
  $fp = fopen($path_data, 'r');
  $array = explode("<-#-".$_GET['kom'].">", fread($fp, filesize($path_data)));
  fclose($fp);
  
  // Sortowanie
  $array = array_reverse($array);
  
  // zwraca kopie tablicy
  $total = count($array) - 1; // + 1;
  $subpages = ceil($total/$for_page) + 1;
  $maxpages = $start + $for_page;
  if ($total == 0){$html .=  "<div class=\"ac_com_red\">".$jezyk['ac_com_new']."</div>";}
  if ($total < $maxpages) $maxpages = $total; // - 1
  for($i=$start;$i<$maxpages;$i++) {
   $value = explode("||",$array[$i]);
  
   $convert_comment = str_replace("\r\n","<br />",$value[3]);
   if ($value[2] == $_GET['kom']) {   
   $html .= " <div class=\"ac_item_background\">\n";
   $html .= "  <div class=\"ac_item\">\n";
   $html .= "   <div class=\"ac_item_details\">";
   $html .= "".($i+1).".";
   $html .= " <font color='#000066'>".$value[0]."</font>";
   $html .= " | <a href=\"mailto:".$value[1]."\"><img src=\"".$dir_img."mail.gif\" alt=\"".$jezyk['ac_email']."\" /></a>";
   $html .= " | ".date("d.m.Y, H:i", $value[4])." "; 
   $html .= '<hr />';
   $html .= "   </div>\n";
   $html .= "   <div class=\"ac_item_text\">".$convert_comment."</div>\n";
   $html .= "  </div>\n";
   $html .= " </div>\n";}
  }
  
  if ($total > $for_page) {
   $pager .= " <div class=\"ac_pager\">";
   for ($i=1; $i<$subpages; $i++) {
    if ($i == $page) {
     $pager .= " <span class=\"ac_span_pager\">".$i."</span> ";
    }
    else {
     $pager .= " <a href=\"".$_SERVER["PHP_SELF"].'?kom='.$_GET['kom'].'&str='.$i."\" class=\"ac_link_pager\">".$i."</a> ";
    }
   }
   $pager .= " </div>\n";
  }
  
  $html .= $pager;
 
  $html .= "</div>\n";
 }
 else if (!isset($message)) {
  $message = "<div class=\"ac_com_red\">".$jezyk['ac_com_new']."</div>";
 }
 
 if(@$_SESSION['zalogowany']==1){
 $login = $_SESSION['login'];
 $pola=mysql_query("SELECT * FROM uzytkownik WHERE login='$login'");
 $pole=mysql_fetch_assoc($pola);

 $html .= "<a name=\"ac_form\"></a>\n";
 
 $html .= "<div class=\"ac_form_header\"><h2>".$jezyk['ac_msg_sign']."</h2></div>\n";

 $html .= "<div class=\"ac_form_background\">\n";

 $html .= " <form action=\"".$_SERVER["PHP_SELF"]."?kom=".$_GET['kom']."&#ac_form\" method=\"post\" class=\"ac_form_form\">\n";
 $html .= "  <table class=\"ac_form_table\">\n";
 
 if (isset($message)) {
  $html .= "  <tr>";
  $html .= "   <td>".$message."</td>";
  $html .= "  </tr>";
 }
 $html .= "  <tr>";
 $html .= "   <td class=\"ac_form_field\"><input name=\"name\" type=\"hidden\"  value=\"".$pole['imie']." ".$pole['nazwisko']."\" maxlength=\"35\" /></td>\n";
 $html .= "  </tr>\n";
 $html .= "  <tr>\n";
 $html .= "   <td class=\"ac_form_field\"><input name=\"email\" type=\"hidden\" value=\"".$pole['email']."\" maxlength=\"50\" /></td>\n";
 $html .= "  </tr>\n";
 $html .= "  <tr>\n";
 $html .= "   <td class=\"ac_form_field\"><input name=\"id\" type=\"hidden\" value=\"".$_GET['kom']."\" maxlength=\"50\" /></td>\n";
 $html .= "  </tr>\n";
 $html .= "  <tr>\n";
 $html .= "   <td class=\"ac_form_field\"><textarea rows=\"8\" style=\"width: 508px\" cols=\"30\" name=\"comment\">".$comment."</textarea></td>\n";
 $html .= "  </tr>\n";
 $html .= "  <tr>\n";
 $html .= "   <td>\n";
 $html .= "  <tr>\n";
 $html .= "   <td align=\"right\" valign=\"top\" class=\"ac_form_save_td\">";
 $html .= "    <input name=\"start\" type=\"hidden\" value=\"save\" />\n";
 $html .= "    <input name=\"save\" value=\"".$jezyk['ac_save']."\" type=\"submit\" class=\"button\" />\n";
 $html .= "</td>\n";
 $html .= "  </tr>\n";
 $html .= "  <tr>\n";
 $html .= "   </td>\n";
 $html .= "  </tr>\n";
 $html .= "  </table>\n";
 $html .= " </form>\n";
 $html .= "</div>\n";
 }
}
echo $html;
}else{echo 'Błąd';}
?>