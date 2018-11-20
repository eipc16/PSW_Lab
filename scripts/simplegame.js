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
  var button = document.getElementById('startButton');

  button.addEventListener("click", function() {
    input_number = getNumber();
    getProbability();

    var prob = Math.random();
    var red = true;
    var number = document.createElement('div');
    var numbers_field = document.getElementById('numbers');
    numbers_field.innerHTML = '';

    number.setAttribute("class", "number-class-black");
    number.setAttribute("id", "number-container");

    var result = 'Na ' + input_number + ' liczb z prawdopodobieństwem wylosowania czerwonej ' + red_prob + ' udalo Ci sie wylosowac ';

    if (prob > red_prob) {
      red = false;
    }

    if (red) {
      number.setAttribute("class", "number-class-red");
      result += ' CZERWONA liczbe!';
    } else {
      result += ' CZARNA liczbe!';
    }

    numbers_field.appendChild(number);

    window.alert(result);

    red_prob = 0.0;
    input_number = 0;
  });

  document.getElementById('testButton').addEventListener("click", function() {
    result = window.prompt('Podaj dowolny ciąg znaków!');
    type = 0 // 0 - string, 1 - float, 2 - int

    if(!isNaN(parseFloat(result))){
      type = 2;
    }

    if(!isNaN(parseInt(result)) && (parseFloat(result) - parseInt(result)) === 0) {
      type = 1;
    }

    switch(type) {
      case 1:
        document.writeln('Wpisales liczbe calkowita!');
        break;
      case 2:
        document.writeln('Wpisales liczbe rzeczywista!');
        break;
      default:
        document.writeln('Wpisales Stringa!');
        break;
    }
  })
};

function isKeyPressed(event) {
  if (event.altKey && event.shiftKey && !event.ctrlKey) {
    window.alert('Wcisnales razem SHIFT i ALT');
  } else if (event.ctrlKey && event.shiftKey && !event.altKey) {
    window.alert('Wcisnales razem SHIFT i CONTROL!');
  } else if (event.ctrlKey && event.shiftKey && event.altKey) {
    window.alert('Wcisnales wszystkie razem!');
  }
}

function savePosition(event) {
    var log = document.getElementById('mousetracker').childNodes[0].wholeText;
    var history = document.getElementById('mouse-history');
    var el = document.createTextNode(log);

    if(history.childNodes.length < 1)
      history.appendChild(el);
    else
      if(history.childNodes.length > 4)
        history.removeChild(history.lastChild);
      history.insertBefore(el, history.firstChild);
}

function updatePosition(event) {
  var div = document.getElementById('mousetracker')

  var coords = document.createTextNode('\nClient X: ' + event.clientX + ' | Client Y: ' + event.clientY + ' ||| Screen X: ' + event.screenX + ' | Screen Y: ' + event.screenY + '\n');

  if(div.childNodes.length < 1)
    div.appendChild(coords);
  else
    div.replaceChild(coords, div.firstChild);
}
