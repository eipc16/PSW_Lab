var red_prob = 0.0;

window.onload = function() {

  do {
    input = window.prompt("Wpisz ile pól chcesz wygenerować", "50");
    input_number = parseInt(Math.floor(input));
  } while (isNaN(input_number));

  while (red_prob < 0.2 || red_prob > 0.8) {
   input = window.prompt("Wpisz prawdopodobieństwo wystąpienia czerwonego pola [0.2, 0.8]", "0.5");
   input_prob = parseFloat(input);
   if(!isNaN(input_prob)) {
     red_prob = input_prob;
   }
  }

  var numbers_field = document.getElementById('numbers');
  for (var i = 0; i < input_number; i++) {
    var number = document.createElement('text');
    number.setAttribute("class", "number-class-black");

    prob = Math.random();
    if (prob > red_prob) {
      class_type = "number-class-black";
    } else {
      class_type = "number-class-red";
    }

    number.setAttribute("class", class_type);

    number.innerHTML = i + 1;
    //document.createElement('div').appendChild(number);
    numbers_field.appendChild(number);
  }
};
