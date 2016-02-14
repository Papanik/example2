using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.IO;
using System.Text;
using System.Net;

using Newtonsoft.Json;
using Google.GData.Client;
using Google.Contacts;
using Google.GData.Contacts;
using Google.GData.Extensions;
public partial class TutorialCode_GoogleContactAPI_google_contact_api : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString["code"] != null)
            GetAccessToken();
    }
    protected void googleButton_Click(object sender, EventArgs e)
    {
        /*https://developers.google.com/google-apps/contacts/v3/
          https://developers.google.com/accounts/docs/OAuth2WebServer
          https://developers.google.com/oauthplayground/
        */
        string clientId = "yourclientId";
        string redirectUrl = "http://www.yogihosting.com/TutorialCode/GoogleContactAPI/google-contact-api.aspx";
        Response.Redirect("https://accounts.google.com/o/oauth2/auth?redirect_uri=" + redirectUrl + "&response_type=code&client_id=" + clientId + "&scope=https://www.google.com/m8/feeds/&approval_prompt=force&access_type=offline");
    }
    public void GetAccessToken()
    {
        string code = Request.QueryString["code"];
        string google_client_id = "yourclientId";
        string google_client_sceret = "yourclientSecret";
        string google_redirect_url = "http://www.yogihosting.com/TutorialCode/GoogleContactAPI/google-contact-api.aspx";

        /*Get Access Token and Refresh Token*/
        HttpWebRequest webRequest = (HttpWebRequest)WebRequest.Create("https://accounts.google.com/o/oauth2/token");
        webRequest.Method = "POST";
        string parameters = "code=" + code + "&client_id=" + google_client_id + "&client_secret=" + google_client_sceret + "&redirect_uri=" + google_redirect_url + "&grant_type=authorization_code";
        byte[] byteArray = Encoding.UTF8.GetBytes(parameters);
        webRequest.ContentType = "application/x-www-form-urlencoded";
        webRequest.ContentLength = byteArray.Length;
        Stream postStream = webRequest.GetRequestStream();
        // Add the post data to the web request
        postStream.Write(byteArray, 0, byteArray.Length);
        postStream.Close();
        WebResponse response = webRequest.GetResponse();
        postStream = response.GetResponseStream();
        StreamReader reader = new StreamReader(postStream);
        string responseFromServer = reader.ReadToEnd();
        GooglePlusAccessToken serStatus = JsonConvert.DeserializeObject<GooglePlusAccessToken>(responseFromServer);
        /*End*/
        GetContacts(serStatus);
    }
    public void GetContacts(GooglePlusAccessToken serStatus)
    {
        string google_client_id = "yourclientId";
        string google_client_sceret = "yourclientSecret";
        /*Get Google Contacts From Access Token and Refresh Token*/
        string refreshToken = serStatus.refresh_token;
        string accessToken = serStatus.access_token;
        string scopes = "https://www.google.com/m8/feeds/contacts/default/full/";
        OAuth2Parameters oAuthparameters = new OAuth2Parameters()
        {
            ClientId = google_client_id,
            ClientSecret = google_client_sceret,
            RedirectUri = "http://www.yogihosting.com/TutorialCode/GoogleContactAPI/google-contact-api.aspx",
            Scope = scopes,
            AccessToken = accessToken,
            RefreshToken = refreshToken
        };


        RequestSettings settings = new RequestSettings("<var>YOUR_APPLICATION_NAME</var>", oAuthparameters);
        ContactsRequest cr = new ContactsRequest(settings);
        ContactsQuery query = new ContactsQuery(ContactsQuery.CreateContactsUri("default"));
        query.NumberToRetrieve = 5000;
        Feed<Contact> feed = cr.Get<Contact>(query);

        StringBuilder sb = new StringBuilder();
        int i = 1;
        foreach (Contact entry in feed.Entries)
        {
            foreach (EMail email in entry.Emails)
            {
                sb.Append(i + "&nbsp;").Append(email.Address).Append("<br/>");
                i++;
            }
        }
        /*End*/
        dataDiv.InnerHtml = sb.ToString();
    }
}