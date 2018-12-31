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
      <asp:RequiredFieldValidator runat="server" id="reqName" controltovalidate="name" errormessage="Wprowadz imie!"/>
      <br><br>
      Nazwisko: <asp:TextBox runat="server" id="lname"/> (np. Nowak)
      <asp:RequiredFieldValidator runat="server" id="reqLname" controltovalidate="lname" errormessage="Wprowadz nazwisko!"/>
      <br><br>
      Wiek: <asp:TextBox runat="server" id="age" />
      <asp:RegularExpressionValidator id="ageValidator1" ControlToValidate="age" runat="server" ErrorMessage="Wiek jest liczba dodatnia!" ValidationExpression="\d+" />
      <asp:RangeValidator runat="server" ID="ageValidator" ControlToValidate="age" MinimumValue="15" MaximumValue="150" ErrorMessage="Musisz mieć co najmniej 15 lat!" />
      <br><br>

      E-mail: <asp:TextBox runat="server" ID="mail" /> (np. adam.nowak@gmail.com) 
      <asp:RegularExpressionValidator ID="mailValidator" ControlToValidate="mail" runat="server" ValidationExpression="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$" ErrorMessage="Podaj POPRAWNY mail!" />
      <br><br>
      Powtórz E-mail:
      <asp:TextBox runat="server" ID="mail2" />
      <asp:CompareValidator runat="server" ID="mail2Validator" ControlToValidate="mail2" ControlToCompare="mail" ErrorMessage="Pola musza byc jednakowe!" />
      <br><br>
      
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
