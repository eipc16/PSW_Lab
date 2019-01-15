using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace PSW_Lab
{
    public partial class PurchaseConfirmation : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["Summary"] != null)
            {
                Summary.Text = Session["Summary"].ToString();
                TotalPrice.Text = Session["TotalPrice"].ToString();
                PaymentMethod.Text = Session["PaymentMethod"].ToString();
                Session.Clear();
            }
            else
                Response.Redirect("Index.aspx");
        }
    }
}