<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="Games.aspx.cs" Inherits="PSW_Lab.Games" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" runat="server">

  <h1><strong>Lista gier</strong></h1>

  <div class="flex-container">
    <script src="scripts/gamedata.js"></script>

    <div class="game-inputs">
      <label for="genre">Gatunek</label>
      <select id="genre" onChange='loadTypes(this.value)'></select>
      <label for="type">Rodzaj</label>
      <select id="type" onChange='updateTables()'></select>
      <label for="search">Nazwa</label>
      <input type="search" id="nameSearch" onChange='updateTables()'/>
   </div>

   <div id="table-container"></div>

   <div>
     <br><br><br><br>
       <label for="collection">Wybierz typ</label>
       <select id="collection">
         <option value="img">Obrazki</option>
         <option value="links">Linki</option>
         <option value="forms">Formularze</option>
         <option value="anchors">Anchors</option>
       </select>

       <label for="collection_index">Indeks elementu</label>
       <input type="number" id="collection_index"/>
       <button onclick="collection('index')">Wybierz</button>

       <label for="collection_id">Identyfikator elementu</label>
       <input type="text" id="collection_id"/>
       <button onclick="collection('id')">Wybierz</button>

   <div id="selected-holder"></div>
   </div>

  </div>

</asp:Content>
