<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="PurchaseSummary.aspx.cs" Inherits="PSW_Lab.PurchaseSummary" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" runat="server">

  <h3>Podsumowanie zakupow</h3>
  <p>
    <asp:Label id="Summary" runat="server"/>
    <br />
    Calkowita cena: <asp:Label id="TotalPrice" runat="server"/> PLN
    <br />
    <a href="Merch.aspx">Powrot do zakupow</a>
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
  
</asp:Content>
