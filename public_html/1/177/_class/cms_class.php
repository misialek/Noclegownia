<?php
ini_set('default_charset', 'UTF-8');
class moderncms {

var $host;
var $username;
var $password;
var $db;

function connect(){
	$con=mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
	mysql_select_db($this->db, $con) or die(mysql_error());
	
}

function get_content($id = '') {
	
	
	function add_content($p) {
		$title = mysql_real_escape_string($p['title']);
		
			$body = mysql_real_escape_string($p['body']);
			
			if(!$title || !$body):
			
			if(!$title):
			echo "<p>the title is required</p>";
			endif;
			if(!$body):
			echo "<p>the body is required</p>";
			endif;
			
			echo '<p><a href="add-content.php">Try again!</a></p>';
			else:
			$sql ="INSERT INTO bla VALUES (null, '$title', '$body')";
			$res = mysql_query($sql) or die(mysql_error());
			echo "added successfully!";
			endif;
	}
}
}
?>