var red_prob = 0.0;
var input_number = 0;

function getNumber() {
  do {
    input = window.prompt("Wpisz ile pól chcesz wygenerować", "50");
    input_num = parseInt(Math.floor(input));
  } while (isNaN(input_num));

  return input_num;
}

function getProbability() {
  while (red_prob < 0.2 || red_prob > 0.8) {
   input = window.prompt("Wpisz prawdopodobieństwo wystąpienia czerwonego pola [0.2, 0.8]", "0.5");
   input_prob = parseFloat(input);
   if(!isNaN(input_prob)) {
     red_prob = input_prob;
   }
  }
}


window.onload = function() {

    input_number = getNumber();
    getProbability();

    var prob = Math.random();
    var red = true;
    var number = document.createElement('div');
    var numbers_field = document.getElementById('numbers');
    
    number.setAttribute("class", "number-class-black");
    number.setAttribute("id", "number-container");

    if (prob > red_prob) {
      red = false;
    }

    if (red) {
      number.setAttribute("class", "number-class-red");
    }

    numbers_field.appendChild(number);
};
