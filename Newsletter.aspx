<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="Newsletter.aspx.cs" Inherits="PSW_Lab.Newsletter" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" runat="server">
<section>
    <h2><strong>Wypelnij powyzszy formularz, aby zapisac sie do naszego NEWSLETTERa!</strong></h2>
    <form id="form2" runat="server">
      Imie: <asp:TextBox runat="server" id="name"/>(np. Adam)
      <asp:RequiredFieldValidator runat="server" id="reqName" controltovalidate="name" errormessage="Wprowadz imie!"/>
      <br><br>
      Nazwisko: <asp:TextBox runat="server" id="lname"/> (np. Nowak)
      <asp:RequiredFieldValidator runat="server" id="reqLname" controltovalidate="lname" errormessage="Wprowadz nazwisko!"/>
      <br><br>
      Wiek: <asp:TextBox runat="server" id="age" />
      <asp:RegularExpressionValidator id="ageValidator1" ControlToValidate="age" runat="server" ErrorMessage="Wiek jest liczba dodatnia!" ValidationExpression="\d+" />
      <asp:RangeValidator runat="server" ID="ageValidator" ControlToValidate="age" MinimumValue=15 Type=Integer MaximumValue=150 ErrorMessage="Musisz mieć co najmniej 15 lat! (i mniej niz 150)" />
      <br><br>

      E-mail: <asp:TextBox runat="server" ID="mail" /> (np. adam.nowak@gmail.com) 
      <asp:RegularExpressionValidator ID="mailValidator" ControlToValidate="mail" runat="server" ValidationExpression="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$" ErrorMessage="Podaj POPRAWNY mail!" />
      <asp:RequiredFieldValidator runat="server" id="mailReqValidator" controltovalidate="mail" errormessage="Wprowadz mail!"/>
      
      <br><br>
      Powtórz E-mail:
      <asp:TextBox runat="server" ID="mail2" />
      <asp:CompareValidator runat="server" ID="mail2Validator" ControlToValidate="mail2" ControlToCompare="mail" ErrorMessage="Pola musza byc jednakowe!" />
      <br><br>
      
      <asp:Button runat="server" id="submit" text="Ok" onclick="btnSubmitForm_Click"/>

    </form>
    <asp:Label runat="server" ID="DataLabel" Visible="false" >aa</asp:Label> 
  </section>
  
</asp:Content>
