var HTML_text = "";

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
