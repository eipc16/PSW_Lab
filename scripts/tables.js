function drawTables(genre, type, name="") {
  var HTML_text = "";

  for (var i = 0; i < data.length; i++) {
    correctGenre = data[i]["Genre"] === genre || genre === "Wszystkie";
    correctType = data[i]["Type"] === type || type === "Wszystkie";
    correctName = data[i]["Title"].includes(name) || name.length === 0;
    if(correctGenre && correctType && correctName){
      HTML_text += "<div><table id=\"" + data[i]["Title"] + "\" class=\"gametable\""
                + "<tr><td colspan=\"2\"><h2>" + data[i]["Title"] + "</h2></td></tr>"
                + "<tr><td class=\"gamedesc\"><h3>Opis</h3><div class=\"gameparagraph\"><p>" + data[i]["Description"] + "</p></div></td>"
                + "<td><table><tr><th>" + data[i]["Title"] + "</th></tr>"
                + "<tr><td><div class=\"gamedetails\">"
                + "<img id=\"screen1\" src=\"" + data[i]["Screenshot_1"] + "\" width=\"232\" height=\"131\" alt=\"Screenshot\">";
      if(data[i]["Screenshot_2"].length > 0)
        HTML_text += "<img id=\"screen2\" src=\"" + data[i]["Screenshot_2"] + "\" width=\"232\" height=\"131\" alt=\"Screenshot\">";

      HTML_text += "<p><strong>Ocena</strong></p>"
                + "<meter value=\"" + data[i]["Rating"] + "\" min=\"0\" max=\"10\" class=\"gamemeter\">" + data[i]["Rating"] + " na 10</meter>"
                + "<p><a href=\"" + data[i]["Download"] + "\">Download</a></p>"
                + "<details><summary>Szczegóły</summary>"
                + "<p><strong>Rok wydania</strong></p>"
                + "<p>" + data[i]["Year"] + "</p>"
                + "<p><strong>Producent</strong></p>"
                + "<p>" + data[i]["Developer"] + "</p>"
                + "</details><br><br>"
                + "</div></td></tr></table></td></tr></table></td></tr></table></div>";
    }
  }

  document.getElementById('table-container').innerHTML = HTML_text;
}

function loadGenres() {
  var options = '';

  for (var i = 0; i < game_types.length + 1; i++){
    if (i === 0)
      genre = "Wszystkie";
    else {
      genre = game_types[i - 1]["Genre"];
    }
    options += "<option value=\"" + genre + "\">" + genre + "</option>";
  }

  document.getElementById('genre').innerHTML = options;
}

function loadTypes(genre="Wszystkie") {
  var options = "<option value=\"Wszystkie\">Wszystkie</option>";

  for (var i = 0; i < game_types.length; i++){
    if (genre === game_types[i]["Genre"] || genre === "Wszystkie"){
      console.log("Selected: " + genre + " Current: " + game_types[i]["Genre"]);
      type_array = game_types[i]["Types"];
      console.log(type_array)
      var j = 0;
      while (j < type_array.length){
        options += "<option value=\"" + type_array[j] + "\">" +  type_array[j] + "</option>";
        j++;
      }
    }
  }

  document.getElementById('type').innerHTML = options;

  updateTables();
}

function updateTables() {

  genre_selector = document.getElementById('genre');
  genre = genre_selector.options[genre_selector.selectedIndex].value;

  type_selector = document.getElementById('type');
  type = type_selector.options[type_selector.selectedIndex].value;

  search = document.getElementById('nameSearch');
  name = search.value;

  drawTables(genre, type, name);
}
