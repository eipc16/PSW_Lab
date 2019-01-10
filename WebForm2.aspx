<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm2.aspx.cs" Inherits="PSW_Lab.WebForm2" %>

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

   <h3>Lista produktow</h3>
 
     <form id="form1" runat="server">
 
         <asp:RadioButtonList id="Categories" runat="server" AutoPostBack=true>
            <asp:ListItem>Kubki</asp:ListItem>
            <asp:ListItem>Koszulki</asp:ListItem>
            <asp:ListItem>Breloki</asp:ListItem>
         </asp:RadioButtonList>
         <asp:CheckBoxList ID="CupsList" runat="server" Visible=false>
         </asp:CheckBoxList>
         <asp:CheckBoxList ID="ShirtsList" runat="server" Visible=false>
         </asp:CheckBoxList>
         <asp:CheckBoxList ID="PendantsList" runat="server" Visible=false>
         </asp:CheckBoxList>
 
         <asp:Button id="AddItems" OnClick="AddItemsToList" Text="Dodaj do koszyak"  runat="server"/>
         <br />
         <p>Ilosc rzeczy w koszyku: <asp:Label id="ICount" runat="server"/></p>

 
     </form>
  <footer>
    <p>Copyright <strong>&copy; P & P, Inc. 2018.</strong> Wszelkie prawa zastrzeżone.</p>
  </footer>

  <script type="text/javascript">
      includeHTML();
  </script>
</body>

</html>
