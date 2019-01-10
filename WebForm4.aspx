<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm4.aspx.cs" Inherits="PSW_Lab.WebForm4" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Podsumowanie - RetroGames</title>
  <meta name="description" content="Podsumowanie">
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
  <h3>Potwierdzenie</h3>
  <p>Dziekujemy za zakupy w naszym sklepie!
    <br />
    <h4>Szczegoly zamowienia:</h4>
    <br />
    <asp:Label id="Summary" runat="server" ></asp:Label>
    <br />
    Kwota laczna: <asp:Label id="TotalPrice" runat="server" ></asp:Label> PLN<br />
    Sposob platnosci: <asp:Label ID="PaymentMethod" runat="server"></asp:Label>
  </p>
  <br />

  <a href="WebForm2.aspx">Powrot do sklepu</a>


  <footer>
    <p>Copyright <strong>&copy; P & P, Inc. 2018.</strong> Wszelkie prawa zastrzeżone.</p>
  </footer>

  <script type="text/javascript">
      includeHTML();
  </script>
</body>

</html>
