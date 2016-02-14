// Request1: obtain logged-in member info
var request = gapi.client.plus.people.get({
    'userId': 'me'
});
request.execute(function(aInfo) {
    // do something else
});

// Request2: obtain friend's activity feed
var restRequest = gapi.client.request({
    'path': '/plus/v1/activities',
    'params': {'query': 'Google+', 'orderBy': 'best'}
});
restRequest.execute(function(activityInfo) {
    // do something else
});

var restRequest = gapi.client.request({
    'path': '/plus/v1/activities',
    'params': {'query': 'Google+', 'orderBy': 'best'}
});
restRequest.execute(function(activityInfo) {

    // render activity items using 'gplusTemplate' template
    $('#actList').html(
        $('#gplusTemplate').render(activityInfo.items)
    );
});