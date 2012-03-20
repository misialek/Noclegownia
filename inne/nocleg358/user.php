
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/colorbox.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.js" ></script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/colorbox.js"></script> 
<script type="text/javascript" src="js/colorbox-min.js"></script> 
<script type="text/javascript" src="js/Myriad_Pro_600.font.js"></script>
<script type="text/javascript" src="js/datepicker.js"></script>
<link type="text/css" href="css/jquery-ui.css" rel="stylesheet">
<link type="text/css" href="css/datepicker.css" rel="stylesheet">


<!--[if lt IE 9]>
	<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
	<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
<script type="text/javascript">
  $(document).ready(function(){


$(".reg").colorbox({iframe:true, width:"465px", height:"450px"});
$(".log").colorbox({iframe:true, width:"465px", height:"450px"});
		});
	</script>
</head>
<body id="page1">
<div class="extra">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Tania baza noclegowa</a></h1>
				<div class="right">
					<div class="wrapper">
						<form id="search" action="" method="post">
							<div class="bg">
								<input type="submit" class="submit" value="">
								<input type="text" class="input">
							</div>
						</form>
					</div>
					<div class="wrapper">
						<nav>
							<ul id="top_nav">
								<li><a class='reg' href="regreg.php"  >Rejestracja</a></li>
																<li><a class='log' href="logowanie.php">Logowanie</a></li>
								<li><a href="#">Pomoc</a></li>
							</ul>
						</nav>
					</div>	
				</div>
			</div>	
			<nav>
				<ul id="menu">
					<li><a href="index.html" class="nav1">Strona glowna</a></li>
					<li><a href="About.html" class="nav2">O nas</a></li>
					<li><a href="Tours.html" class="nav3">Polecane miejsca</a></li>
					<li><a href="Destinations.html" class="nav4">Promocje</a></li>
					<li class="end"><a href="Contacts.html" class="nav5">Kontakt</a></li>
				</ul>
			</nav>
			<article class="col1">
				<ul class="tabs">
					<li><a href="#" class="active">Znajdz miejsce</a></li>
					<li><a href="#">Inna zakladka</a></li>
					
				</ul>
				<div class="tabs_cont">
					<form id="form_1" action="" method="post">
						<div class="bg">
							<div class="wrapper">
								<div> Typ miejsca:
								<select name="nazwa">
		<option>Hotel</option>
		<option>Agroturystyka</option>
		<option>Kwatera prywatna</option>
		<option>Schronisko</option>
		<option>Motel</option>		
	</select>
	</div>
				
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	
	
	</script>



<div class="demo">

<p>Date: <input type="text" id="datepicker"></p>

</div><!-- End demo -->				
							<div class="wrapper"><input id="datepicker" name="datepicker" type="text" class="input input2">Data przybycia:</div>
							<div class="wrapper pad_bot1"><input id="datepicker" type="text" class="input input2" value="04/11/2010"  onblur="if(this.value=='') this.value='04/11/2010'" onfocus="if(this.value =='04/11/2010' ) this.value=''">Data wyjazdu:</div>
							<div class="wrapper">
								<div class="radio"><input type="radio" name="name2" checked>Economy cabin</div>
								<div class="radio end"><input type="radio" name="name2">Business</div>
							</div>
							<div class="wrapper pad_bot1">
								<a href="#" class="button" onclick="document.getElementById('form_1').submit()">Szukaj</a>
								Audlts <select><option>1</option></select>
							</div>
						</div>							
					</form>
				</div>
			</article>
			<article class="col1 pad_left1">
				<div class="text">
					<img src="images/text1.jpg" alt="">
					<h2>The Best Offers</h2>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
					<a href="#" class="button">Zobacz wiecej</a>
				</div>
			</article>
			<div class="img"><img src="images/img.jpg" alt=""></div>
		</header><div class="ic">More Website Templates at TemplateMonster.com!</div>
<!-- / header -->
<!-- content -->
		<section id="content">
			<article class="col1">
				<h3>Gorace oferty</h3>
				<div class="pad">
					<div class="wrapper under">
						<figure class="left marg_right1"><img src="images/page1_img1.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Italy<br>Holidays</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
					<div class="wrapper under">
						<figure class="left marg_right1"><img src="images/page1_img2.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Philippines<br>Travel</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
					<div class="wrapper">
						<figure class="left marg_right1"><img src="images/page1_img3.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Cruise<br>Holidays</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
				</div>
       		</article>
			<article class="col2 pad_left1">
				<h2>Wyniki wyszukiwania</h2>
				<div class="wrapper under">
					<figure class="left marg_right1"><img src="images/page1_img4.jpg" alt=""></figure>
					<p class="pad_bot2"><strong>Hotel du Havre</strong></p>
					<p class="pad_bot2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
					<p class="pad_bot2"><strong>Nemo enim ipsam voluptatem</strong> quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.</p>
					<a href="#" class="marker_2"></a>
				</div>
				<div class="wrapper">
					<figure class="left marg_right1"><img src="images/page1_img5.jpg" alt=""></figure>
					<p class="pad_bot2"><strong>Hotel Vacance</strong></p>
					<p class="pad_bot2">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.</p>
					<p class="pad_bot2">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda.</p>
					<a href="#" class="marker_2"></a>
				</div>
       		</article>
		</section>
		<?php
		    foreach (glob("images/*.*") as $filename)
    {
    echo '<img src="'.$filename.'" width="120" height="60"/>';
    echo "<br>";
    echo $filename;
    echo "<br>";
    echo filesize($filename);
    echo "<br>";
    }
  
 ?>

<!-- / content -->
	</div>
	<div class="block"></div>
</div>
<div class="body1">
	<div class="main">
<!-- footer -->
		<footer>
			Baza noclegowa<br/>
			Copyright 2012
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>