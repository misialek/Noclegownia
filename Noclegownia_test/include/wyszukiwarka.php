				<article class="col1">
				<ul class="tabs">
					<li><a class="active">Znajdz miejsce</a></li>
				</ul>
				<div class="tabs_cont">
					<form id="form_1" action="" method="post">
						<div class="bg">
							<div class="wrapper">
								<div> Typ miejsca:
								<select name="nazwa" class="input input2">
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
			$( "#datepicker1" ).datepicker();
	});
	
	
	</script>


<div class="wrapper">Miasto:<input type="text" class="input input2"></div>
<div class="wrapper">Data przybycia:<input type="text" id="datepicker" class="input input2"></div>
<div class="wrapper">Data wyjazdu:<input type="text" id="datepicker1" class="input input2"></div>
</div><!-- End demo -->				
							
							<div class="wrapper">
								<div class="radio"><input type="checkbox" name="tv">TV</div>
                                <div class="radio"><input type="checkbox" name="logowka">Lodówka</div>
                                <div class="radio"><input type="checkbox" name="wc">WC</div>
                            	<div class="radio"><input type="checkbox" name="prysznic">Prysznic</div>
                                <div class="radio"><input type="checkbox" name="wanna">Wanna</div>
                                <div class="radio"><input type="checkbox" name="jacuzzi">Jacuzzi&nbsp;&nbsp;</div>
                                <div class="radio end"><input type="checkbox" name="klimatyzacja">Klimatyzacja</div>
								<div class="radio end"><input type="checkbox" name="internet">Internet</div>
							</div>
							<a href="#" class="button" onclick="document.getElementById('form_1').submit()">Szukaj</a>
							<br>
						</div>							
					</form>
				</div>
				</article>