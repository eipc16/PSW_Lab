using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Collections;

namespace PSW_Lab
{
    public partial class WebForm2 : System.Web.UI.Page
    {
        Hashtable cups;
        Hashtable shirts;
        Hashtable pendants;
        int curr_category;

        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                cups = new Hashtable();
                shirts = new Hashtable();
                pendants = new Hashtable();
                cups.Add("czerwony kubek", 2.90);
                cups.Add("zielony kubek", 3.15);
                shirts.Add("czerwona koszulka", 15.90);
                shirts.Add("zielony koszulka", 15.90);
                pendants.Add("breloczek z mario", 8.90);
                pendants.Add("breloczek z pikachu", 14.90);
                FillList();
            }
            else
            {
                if (Categories.SelectedIndex == 0)
                {
                    CupsList.Visible = true;
                    ShirtsList.Visible = false;
                    PendantsList.Visible = false;
                }
                else if (Categories.SelectedIndex == 1)
                {
                    CupsList.Visible = false;
                    ShirtsList.Visible = true;
                    PendantsList.Visible = false;
                }
                else if (Categories.SelectedIndex == 2)
                {
                    CupsList.Visible = false;
                    ShirtsList.Visible = false;
                    PendantsList.Visible = true;
                }
            }

        

        }

        protected void FillList()
        {
            foreach (DictionaryEntry product in cups) {
                CupsList.Items.Add(product.Key + ": " + product.Value.ToString());
            }
            foreach (DictionaryEntry product in shirts)
            {
                ShirtsList.Items.Add(product.Key + ": " + product.Value.ToString());
            }
            foreach (DictionaryEntry product in pendants)
            {
                PendantsList.Items.Add(product.Key + ": " + product.Value.ToString());
            }
            
        }
    }
}