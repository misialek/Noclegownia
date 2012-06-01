				<article class="col1">
				<ul class="tabs">
					<li><a class="active">Znajdz miejsce</a></li>
				</ul>
				<div class="tabs_cont">
					<form id="form_1" action="wyszukaj.php" method="post">
					<input type="hidden" name="wyszukaj" value="TRUE" />
						<div class="bg">
							<div class="wrapper">
								<div> Typ miejsca:
								<select name="typ_miejsca" class="input input2" style="width:80px;">
		<option>Hotel&nbsp;&nbsp;</option>
		<option>Agroturystyka&nbsp;&nbsp;</option>
		<option>Kwatera prywatna&nbsp;&nbsp;</option>
		<option>Schronisko&nbsp;&nbsp;</option>
		<option>Motel&nbsp;&nbsp;</option>		
	</select>
	</div>
				
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
			$( "#datepicker1" ).datepicker();
	});
	
	
	</script>


<div class="wrapper">Miasto:<input type="text" name="miasto" class="input input2"></div>
<div class="wrapper">Data przybycia:<input type="text" name="data_przybycia" id="datepicker" class="input input2"></div>
<div class="wrapper">Data wyjazdu:<input type="text" name="data_wyjazdu" id="datepicker1" class="input input2"></div>
</div><!-- End demo -->				
							
							<div class="wrapper">
								<input type="hidden" name="tv" value="0" />
								<div class="radio"><input type="checkbox" name="tv" value="1">TV</div>
								<input type="hidden" name="lodowka" value="0" />
                                <div class="radio"><input type="checkbox" name="lodowka" value="1">Lodówka</div>
								<input type="hidden" name="wc" value="0" />
                                <div class="radio"><input type="checkbox" name="wc" value="1">WC</div>
								<input type="hidden" name="prysznic" value="0" />
                            	<div class="radio"><input type="checkbox" name="prysznic" value="1">Prysznic</div>
								<input type="hidden" name="wanna" value="0" />
                                <div class="radio"><input type="checkbox" name="wanna" value="1">Wanna</div>
								<input type="hidden" name="jacuzzi" value="0" />
                                <div class="radio"><input type="checkbox" name="jacuzzi" value="1">Jacuzzi&nbsp;&nbsp;</div>
								<input type="hidden" name="klimatyzacja" value="0" />
                                <div class="radio end"><input type="checkbox" name="klimatyzacja" value="1">Klimatyzacja</div>
								<input type="hidden" name="internet" value="0" />
								<div class="radio end"><input type="checkbox" name="internet" value="1">Internet</div>
							</div>
							<a href="#" class="button" onclick="document.getElementById('form_1').submit()">Szukaj</a>
							<br>
						</div>							
					</form>
				</div>
				</article>