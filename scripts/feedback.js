var helpArray = ["Powiedz nam jak się nazywasz!",
		 "Podziel się z nami swoją opinią!",
		 "Podaj nam swój E-mail, w celu późniejszego kontaktu",
		 "Oceń naszą stronę!",
		 "Powiedz nam co możemy poprawić w przyszłości!",
		 "Powiedz nam w jaki sposób tutaj trafiłeś!"];

var inputTypes = ["name", "comments", "email", "rating", "checkboxDiv", "radioDiv"];

var helpText;

window.onload = function() {
  helpText = document.getElementById('textHelp');

  helpText.setAttribute("style", "font-size: 24px;color:blue;");

  for(var i = 0; i < inputTypes.length; i++) {
		if(i < 4)
    	registerListeners(document.getElementById(inputTypes[i]), i, ["focus", "blur"]);
		else{
			registerListeners(document.getElementById(inputTypes[i]), i, ["mouseover", "mouseout"]);
			console.log('elo');
		}
	}

  registerFormListeners(document.getElementById('feedback-form'));
}

function registerFormListeners(object) {
  object.addEventListener("submit", function() {
    return confirm("Czy jesteś pewien, że chcesz wysłac ten formularz?");
  }, false);
  object.addEventListener("reset", function() {
    return confirm("Czy jesteś pewien, że chcesz zresetowac ten formularz?");
  }, false);
}

function registerListeners(object, index, type) {
  object.addEventListener(type[0], function() {
    helpText.innerHTML = helpArray[index];
  }, false);
  object.addEventListener(type[1], function() {
    helpText.innerHTML = "";
  }, false);
}
