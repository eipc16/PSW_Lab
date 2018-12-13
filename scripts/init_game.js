clicks = 0;

window.onload = function() {
  window.addEventListener("click", function() {
    clicks++;

    console.log('Clicks: ' + clicks);
    if(clicks > 3) {
      if(window.location.hostname === 'eipc16.github.io') {
        window.location.pathname = '/PSW_Lab/simplegame.php';
      } else {
        window.location.pathname = '/simplegame.php';
      }
    }
  });
}

var interval = setInterval(function () {
  clicks = 0;
}, 1000);
