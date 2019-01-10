using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace PSW_Lab
{
    public partial class WebForm3 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["Summary"] == null)
            {
                Summary.Text = "Nie ma nic w koszyku!";
                Submit.Enabled = false;
            }
            else
            {
                Summary.Text = (string)Session["Summary"];
                TotalPrice.Text = Session["TotalPrice"].ToString();
                Submit.Enabled = true;
            }
        }

        protected void SubmitOrder(object sender, EventArgs e)
        {
            Session["PaymentMethod"] = PaymentMethod.SelectedValue;
            Response.Redirect("WebForm4.aspx");
        }
    }
}