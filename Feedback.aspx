<%@ Page Title="" Language="C#" MasterPageFile="~/Site1.Master" AutoEventWireup="true" CodeBehind="Feedback.aspx.cs" Inherits="PSW_Lab.Feedback" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" runat="server">

  <h1>Wyślij swoją opinię</h1>
  <p>Tutaj możesz przekazać nam swoją opinię o stronie!</p>

  <form id="feedback-form" method="post" action="index.html">

    <input type="hidden" name="recipient" value="pprzemek.312@gmail.com">
    <input type="hidden" name="subject" value="Formularz opiniowy">
    <input type="hidden" name="redirect" value="index.html">

    <p><label>Imię:
        <input id="name" name="name" type="text" size="25">
      </label></p>

    <p><label>Opinia:
        <textarea id="comments" name="comments" rows="4" cols="36" maxlength="200"></textarea>
      </label></p>

    <p><label>E-mail:
        <input id="email" name="name" type="email" size="25">
      </label></p>

    <p>
      <label>Oceń naszą stronę:
        <select id="rating">
          <optgroup label="Podoba mi się">
            <option value="verygood">Bardzo</option>
            <option value="somewhatgood">Trochę</option>
          </optgroup>
          <optgroup label="Nie podoba mi się">
            <option value="verybad">Bardzo</option>
            <option value="somewhatbad">Trochę</option>
          </optgroup>
        </select>
      </label>
    </p>

    <div id="checkboxDiv">
    <strong>Wybierz rzeczy, które chciałbyś poprawić</strong>

    <p>
      <label>Wygląd strony
        <input id="content" name="design" type="checkbox" value="Design"></label>

      <label>Informacje na stronie
        <input id="content" name="content" type="checkbox" value="Content"></label>

      <label>Trudna w obsłudze
        <input id="content" name="easyUse" type="checkbox" value="EasyUse" disabled></label>
    </p>

  </div>

  <div id="radioDiv">
    <strong>Powiedz nam jak znalazłeś naszą stronę!</strong>
    <p>
      <label>Wyszukiwarka
        <input id="radioButtons" name="radioButtons" type="radio" value="SearchEngine" checked></label>

      <label>Link z innej strony
        <input id="radioButtons" name="radioButtons" type="radio" value="Link"></label>

      <label>Od znajomego
        <input id="radioButtons" name="radioButtons" type="radio" value="FromFriend"></label>

      <label>Inny sposób
        <input id="radioButtons" name="radioButtons" type="radio" value="Other"></label>
    </p>
  </div>
    <p>
      <input type="submit" value="Submit">
      <input type="reset" value="Clear">
    </p>

  </form>

  <p id="textHelp"></p>

</asp:Content>
