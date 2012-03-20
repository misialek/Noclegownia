$(document).ready(function(){
    $("#rejestracja").validate({  
        rules: {
            login: {
                required: true,
                minlength: 4,
				maxlength: 25
                },
            haslo: {
                required: true,
                minlength: 5,
				 maxlength: 25
				
                },
            haslo2: {
                required: true,
                equalTo: "#haslo"
                },
            email: {
                required: true,
                email: true
                },				
			email2: {
                required: true,               
				equalTo: "#email"
                }
            },
        messages: {
            login:{
                required: "   Prosze podać login",
                minlength: "   Min długość to 4 znaki",
				 maxlength: "   Min długość to 25 znaków"
				
            },
            haslo:{
                required: "   Hasło nie może być puste",
                minlength: "   Min długość to 5 znaków",
				maxlength: "   Min długość to 25 znaków"
            },
            haslo2:{
                required: "   Powtórz hasło",
                equalTo: "   Hasła są różne"
            },
            email:{
                required: "   Wprowadź e-mail",
                email: "   Wprowadź poprawny e-mail"
                },
			email2:{
                required: "   Powtórz email",
                equalTo: "   Maile są różne"
            }
        },
		success: function(label) {
			label.html("&nbsp;").addClass("sprawdzony");
		}

  });
});