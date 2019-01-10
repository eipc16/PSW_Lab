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

        protected void Page_Load(object sender, EventArgs e)
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

        protected void FillList()
        {
            foreach (DictionaryEntry product in cups) {
                products.Items.Add(product.Key + ": " + product.Value.ToString());
            }
            foreach (DictionaryEntry product in shirts)
            {
                products.Items.Add(product.Key + ": " + product.Value.ToString());
            }
            foreach (DictionaryEntry product in pendants)
            {
                products.Items.Add(product.Key + ": " + product.Value.ToString());
            }
        }
    }
}