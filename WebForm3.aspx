<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm3.aspx.cs" Inherits="PSW_Lab.WebForm3" %>

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
  <h3>Podsumowanie zakupow</h3>
  <p>
    <asp:Label id="Summary" runat="server"/>
    <br />
    Calkowita cena: <asp:Label id="TotalPrice" runat="server"/> PLN
    <br />
    <a href="WebForm2.aspx">Powrot do zakupow</a>
  </p>
  <h4>Sposob platnosci</h4>
  <form id="Form1" runat="server">
    <asp:RadioButtonList id="PaymentMethod" runat="server">
      <asp:ListItem>Karta</asp:ListItem>
      <asp:ListItem>Gotowka</asp:ListItem>
      <asp:ListItem>Przelew</asp:ListItem>
    </asp:RadioButtonList>
    <asp:Button ID="Submit" runat="server" Text="Zloz zamowienie" OnClick="SubmitOrder" Enabled=false />
  </form>
  

  <footer>
    <p>Copyright <strong>&copy; P & P, Inc. 2018.</strong> Wszelkie prawa zastrzeżone.</p>
  </footer>

  <script type="text/javascript">
      includeHTML();
  </script>
</body>

</html>
