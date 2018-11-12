clicks = 0;

window.onload = function() {
  window.addEventListener("click", function() {
    clicks++;

    console.log('Cliks: ' + clicks);
    if(clicks > 5) {
      if(window.location.hostname === 'eipc16.github.io') {
        window.location.pathname = '/PSW_Lab/simplegame.html';
      } else {
        window.location.pathname = '/simplegame.html';
      }
    }
  });
}

var interval = setInterval(function () {
  clicks = 0;
}, 1000);
