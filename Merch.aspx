<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="Merch.aspx.cs" Inherits="PSW_Lab.Merch" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" runat="server">
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
 
         <asp:Button id="AddItems" OnClick="AddItemsToList" Text="Dodaj do koszyka"  runat="server"/>
         <br />
         <p>Ilosc rzeczy w koszyku: <asp:Label id="ICount" runat="server"/></p>
         <br />
         <a href="PurchaseSummary.aspx">Podsumowanie zamowienia</a>

 
     </form>

</asp:Content>
