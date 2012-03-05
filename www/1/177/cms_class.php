<?php

class moderncms {

var $host;
var $username;
var $password;
var $db;

function connect(){
	$con=mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
	mysql_select_db($this->db, $con) or die(mysql_error());
	
}


	
	
	function wyznaj_grzechy($p) {
		$timeAgo = mysql_real_escape_string($p['timeAgo']);
		
			$body = mysql_real_escape_string($p['body']);
			
			if(!$timeAgo || !$body):
			
			if(!$timeAgo):
			echo "<p>Nie zostal podany okres czasu od ostatniej spowiedzi</p>";
			endif;
			if(!$body):
			echo "<p>Grzechy nie zostaly wymienione</p>";
			endif;
			
			echo '<p><a href="wyznaj_grzechy.php">Sprobuj jeszcze raz!</a></p>';
			else:
			$sql ="INSERT INTO grzechy VALUES (null, '$timeAgo', '$body')";
			$res = mysql_query($sql) or die(mysql_error());
			echo "Pomyslnie zgrzeszono!";
			endif;
	}
}

?>