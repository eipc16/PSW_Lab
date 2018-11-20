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
      if(history.childNodes.length > 8){
        history.removeChild(history.lastChild);
        history.removeChild(history.lastChild);
      }
    history.insertBefore(document.createElement('br'), history.firstChild);
    history.insertBefore(el, history.firstChild);


    console.log(history);
}

function updatePosition(event) {
  var div = document.getElementById('mousetracker')

  var coords = document.createTextNode('Client X: ' + event.clientX + ' | Client Y: ' + event.clientY + ' ||| Screen X: ' + event.screenX + ' | Screen Y: ' + event.screenY);

  if(div.childNodes.length < 1)
    div.appendChild(coords);
  else
    div.replaceChild(coords, div.firstChild);
}

function setStyle() {
  background = document.getElementById('backgroundcolor').value
  color = document.getElementById('fontcolor').value
  size = document.getElementById('fontsize').value
  document.body.setAttribute("style", "background-color: " + background + ";color: " + color + ";font-size: " + size);
}
