<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="PurchaseConfirmation.aspx.cs" Inherits="PSW_Lab.PurchaseConfirmation" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" runat="server">
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

  <a href="Merch.aspx">Powrot do sklepu</a>
</asp:Content>
