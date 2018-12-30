<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm1.aspx.cs" Inherits="PSW_Lab.WebForm1" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formularz - RetroGames</title>
  <meta name="description" content="Formularz">
  <meta name="author" content="Przemysław Pietrzak, Mateusz Pakuła">
  <meta name="keywords" content="retro, games, gry, old, stare, game, oldschool">

  <link rel="stylesheet" href="styles/main_stylesheet.css">
  <link rel="stylesheet" href="styles/navigation.css">

  <script src="scripts/navigation.js"></script>
</head>

<body>
  <nav>
    <div w3-include-html="navigation.html"></div>
  </nav>

  <section>
    <h2><strong>Wypelnij powyzszy formularz, aby zapisac sie do naszego NEWSLETTERa!</strong></h2>
    <form id="form1" runat="server">
      Imie: <asp:TextBox runat="server" id="name"/>(np. Adam)
      <asp:RequiredFieldValidator runat="server" id="reqName" controltovalidate="name" errormessage="Błąd: Wprowadz imie!"/>
      <br><br>
      Nazwisko: <input type="text" name="lname" required> (np. Nowak)<br><br>
      Miesiac urodzin: <input type="text" value="" list="months">
      <datalist id="months">
        <option value="Styczeń"></option>
        <option value="Luty"></option>
        <option value="Marzec"></option>
        <option value="Kwiecień"></option>
        <option value="Maj"></option>
        <option value="Czerwiec"></option>
        <option value="Lipiec"></option>
        <option value="Sierpień"></option>
        <option value="Wrzesień"></option>
        <option value="Październik"></option>
        <option value="Listopad"></option>
        <option value="Grudzien"></option>
      </datalist> (np. Luty) <br><br>
      E-mail: <input type="email" name="email" required> (np. adam.nowak@gmail.com) <br><br>
      Tel.: <input type="tel" name="tel" pattern="^[1-9]\d{2}-\d{3}-\d{3}$"> np. (123-456-789)<br><br>
      <asp:Button runat="server" id="submit" text="Ok" onclick="btnSubmitForm_Click"/>
    </form>
  </section>
  <footer>
    <p>Copyright <strong>&copy; P & P, Inc. 2018.</strong> Wszelkie prawa zastrzeżone.</p>
  </footer>

  <script type="text/javascript">
      includeHTML();
  </script>
</body>

</html>
