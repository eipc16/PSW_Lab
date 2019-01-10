﻿using System;
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
        Hashtable cupsCount;
        Hashtable shirtsCount;
        Hashtable pendantsCount;


        protected void Page_Load(object sender, EventArgs e)
        {
            cups = new Hashtable();
            shirts = new Hashtable();
            pendants = new Hashtable();
            cupsCount = new Hashtable();
            shirtsCount = new Hashtable();
            pendantsCount = new Hashtable();
            cups.Add("czerwony kubek", 2.90);
            cups.Add("zielony kubek", 3.15);
            cupsCount.Add("czerwony kubek", 0);
            cupsCount.Add("zielony kubek", 0);
            shirts.Add("czerwona koszulka", 15.90);
            shirts.Add("zielona koszulka", 15.90);
            shirtsCount.Add("czerwona koszulka", 0);
            shirtsCount.Add("zielona koszulka", 0);
            pendants.Add("breloczek z mario", 8.90);
            pendants.Add("breloczek z pikachu", 14.90);
            pendantsCount.Add("breloczek z mario", 0);
            pendantsCount.Add("breloczek z pikachu", 0);
            if (Session["ItemCount"] == null)
                Session["ItemCount"] = 0;
            ICount.Text = Session["ItemCount"].ToString();
            if (!IsPostBack)
            {
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
                CupsList.Items.Add(product.Key.ToString());
            }
            foreach (DictionaryEntry product in shirts)
            {
                ShirtsList.Items.Add(product.Key.ToString());
            }
            foreach (DictionaryEntry product in pendants)
            {
                PendantsList.Items.Add(product.Key.ToString());
            }
            
        }

        protected void AddItemsToList(object sender, EventArgs e) {
            foreach (ListItem product in CupsList.Items)
                if (product.Selected)
                {
                    if (Session[product.Value] == null) {
                        Session[product.Value] = 1;
                        Session["ItemCount"] = Int32.Parse(Session["ItemCount"].ToString()) + 1;
                        if (Session["Summary"] == null)
                            Session["Summary"] = product.Value + ": " + cups[product.Value].ToString() + " PLN";
                        else
                            Session["Summary"] = Session["Summary"] + "<br />" + product.Value + ": " + cups[product.Value].ToString() + " PLN";
                        if (Session["TotalPrice"] == null)
                            Session["TotalPrice"] = cups[product.Value];
                        else
                            Session["TotalPrice"] = (double)Session["TotalPrice"] +  (double) cups[product.Value];
                    }
                    product.Selected = false;
                }
            foreach (ListItem product in ShirtsList.Items)
                if (product.Selected)
                {
                    if (Session[product.Value] == null)
                    {
                        Session[product.Value] = 1;
                        Session["ItemCount"] = Int32.Parse(Session["ItemCount"].ToString()) + 1;
                        if (Session["Summary"] == null)
                            Session["Summary"] = product.Value + ": " + shirts[product.Value].ToString() + " PLN";
                        else
                            Session["Summary"] = Session["Summary"] + "<br />" + product.Value + ": " + shirts[product.Value].ToString() + " PLN";
                        if (Session["TotalPrice"] == null)
                            Session["TotalPrice"] = shirts[product.Value];
                        else
                            Session["TotalPrice"] = (double)Session["TotalPrice"] + (double)shirts[product.Value];
                    }
                    product.Selected = false;
                }
            foreach (ListItem product in PendantsList.Items)
                if (product.Selected)
                {
                    if (Session[product.Value] == null)
                    {
                        Session[product.Value] = 1;
                        if(Session["ItemCount"] != null) 
                            Session["ItemCount"] = Int32.Parse(Session["ItemCount"].ToString()) + 1;
                        if (Session["Summary"] == null)
                            Session["Summary"] = product.Value + ": " + pendants[product.Value].ToString() + " PLN";
                        else
                            Session["Summary"] = Session["Summary"] + "<br />" + product.Value + ": " + pendants[product.Value].ToString() + " PLN";
                        if (Session["TotalPrice"] == null)
                            Session["TotalPrice"] = pendants[product.Value];
                        else
                            Session["TotalPrice"] = (double)Session["TotalPrice"] + (double)pendants[product.Value];
                    }
                    product.Selected = false;
                }
            ICount.Text = Session["ItemCount"].ToString();
        }
    }
}