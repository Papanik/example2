//
// Client IDS
// Defines the CLIENT_ID (AppID's) of the OAuth2 providers
// relative to the domain host where this code is presented.

var location_https = window.location.href.indexOf('https://') === 0;


// Register your domain with Facebook at  and add here
var FACEBOOK_CLIENT_ID = {
	'local.knarly.com' : '1469360673372624',
}[window.location.hostname] || '160981280706879';

// Google Register --  https://console.developers.google.com
var GOOGLE_CLIENT_ID = '276566624751-uq4dgt76411r0d8emc6aq1hd7839quc0.apps.googleusercontent.com';

// To make it a little easier
var CLIENT_IDS = {

	google : GOOGLE_CLIENT_ID,
	facebook : FACEBOOK_CLIENT_ID
};
// To make it a little easier
var CLIENT_IDS_ALL = {
	
	google : GOOGLE_CLIENT_ID,
	facebook : FACEBOOK_CLIENT_ID
	
};


//
// OAUTH PROXY
//
var OAUTH_PROXY_URL = {
	'local.knarly.com' : 'http://local.knarly.com:5500/proxy'
}[window.location.hostname] || 'https://auth-server.herokuapp.com/proxy';



//
// Redirect URI
//
var REDIRECT_URI = '/hello.js/redirect.html';
if (typeof chrome === 'object' && typeof chrome.identity === 'object' && chrome.identity.launchWebAuthFlow) {
	REDIRECT_URI = 'https://'+window.location.hostname+'.chromiumapp.org/redirect.html';
}
