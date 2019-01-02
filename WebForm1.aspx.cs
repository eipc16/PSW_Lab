using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace PSW_Lab
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (IsPostBack)
                setDataLabel();

        }

        protected void btnSubmitForm_Click(object sender, EventArgs e)
        {
            if (Page.IsValid)
                submit.Text = "Wyslano!";
        }
        protected void setDataLabel()
        {
            DataLabel.Text = "Imie: " + name.Text + "<br>" + "Nazwisko: " + lname.Text + "<br>" + "Wiek: " + age.Text + "<br>" + "Mail: " + mail.Text + "<br>";
            DataLabel.Visible = true;
        }
    }
}