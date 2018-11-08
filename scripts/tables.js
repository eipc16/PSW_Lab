var HTML_text = "";

//HTML_text += "<div class=\"category\"><ul>"; HUJ NIE MA MENU
//
//for (var i = 0; i < game_types.length; i++){
//  HTML_text += "<li>" + game_types[i]["Genre"] + "<ul>";
//
//  for (var j = 0; j < game_types[i]["Types"].length; j++){
//    types = game_types[i]["Types"];
//    HTML_text += "<li>" + types[j] + "<ul class=\"gametitle\">"
//
//    for (var z = 0; z < data.length; z++) {
//      if (data[i]["Genre"] === game_types[i]["Genre"] && data[i]["Type"] === types[j]) {
//        HTML_text += "<li><a href=\"#" + data[i]["Title"] + "\">" + data[i]["Title"] + "</a></li>";
//      }
//    }
//    HTML_text += "</ul></li>";
//  }
//  HTML_text += "</ul></li>";
//}

HTML_text += "</ul><div>";

for (var i = 0; i < data.length; i++) {
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

document.write(HTML_text);
