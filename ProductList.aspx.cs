using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.Odbc;

namespace PSW_Lab
{
    public partial class ProductList : System.Web.UI.Page
    {
        private System.ComponentModel.IContainer components;
    
        protected void Page_Load(object sender, EventArgs e)
        {
            bool isLoggedIn = System.Web.HttpContext.Current.User.Identity.IsAuthenticated;
            if (isLoggedIn)
            {
                EditLink.Visible = true;
            }
            else
            {
                EditLink.Visible = false;
            }
                

        }

        private void InitializeComponent()
        {

        }

        protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }
    }
}