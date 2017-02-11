exports.handler = function (event, context) {
    try {

        if (event.session.new) {
            onSessionStarted({requestId: event.request.requestId}, event.session);
        }

        if (event.request.type === "LaunchRequest") {
            onLaunch(event.request,
                event.session,
                function callback(sessionAttributes, speechletResponse) {
                    context.succeed(buildResponse(sessionAttributes, speechletResponse));
                });
        } else if (event.request.type === "IntentRequest") {
            onIntent(event.request,
                event.session,
                function callback(sessionAttributes, speechletResponse) {
                    context.succeed(buildResponse(sessionAttributes, speechletResponse));
                });
        } else if (event.request.type === "SessionEndedRequest") {
            onSessionEnded(event.request, event.session);
            context.succeed();
        }
    } catch (e) {
        context.fail("Exception: " + e);
    }
};


function onSessionStarted(sessionStartedRequest, session) {
    console.log("onSessionStarted requestId=" + sessionStartedRequest.requestId
        + ", sessionId=" + session.sessionId);
}

function onLaunch(launchRequest, session, callback) {
    console.log("onLaunch requestId=" + launchRequest.requestId
        + ", sessionId=" + session.sessionId);
        
    var speechOutput = "Welcome to Baeocat Break In"
    callback(session.attributes,
        buildSpeechletResponse(speechOutput, "", false));
}

function onIntent(intentRequest, session, callback) {
    console.log("onIntent requestId=" + intentRequest.requestId
        + ", sessionId=" + session.sessionId);

    var intent = intentRequest.intent,
        intentName = intentRequest.intent.name;

    // dispatch custom intents to handlers here
    if (intentName == 'BeginGame' || intentName == 'EndGame' || intentName == 'PlayGame') {
        handleTestRequest(intent, session, callback);
    }
    else {
        throw "Invalid intent";
    }
}

function onSessionEnded(sessionEndedRequest, session) {
    console.log("onSessionEnded requestId=" + sessionEndedRequest.requestId
        + ", sessionId=" + session.sessionId);
}

function handleTestRequest(intent, session, callback) {
    var host = "https://testing.atodd.io";
    
    
    switch(intent.name){
        case "BeginGame":
            var gameName = intent.slots.GameName.value;
            var speechOutput = "Game: " + gameName + " has been started."
            var path = "/api/begin";
            
            var request = httpRequest(host, path);
            var speechOutput = "Game: " + gameName + " has been started. Server response is, " + request;
            callback(session.attributes,
                buildSpeechletResponse(speechOutput, "", false));
            break;
            
        case "PlayGame":
            var move = intent.slots.move.value;
            var location = intent.slots.location.value;
            var item = intent.slots.item.value;
            var path = "/api/play";
        
            var request = httpRequest(host, path);
            
            if(location == undefined){
                if(item == undefined){
                    var speechOutput = "Move: " + move + " has been played. Server response is, " + request;
                }
                else{
                    var speechOutput = "Move: " + move + " " + item + " has been played. Server response is, " + request;
                }
            }
            else{
                if(item == undefined){
                    var speechOutput = "Move: " + move + " " + location + " has been played. Server response is, " + request;
                }
                else{
                    var speechOutput = "Move: " + move + " " + location + " " + item + " has been played. Server response is, " + request;
                }
            }
            callback(session.attributes,
                buildSpeechletResponse(speechOutput, "", false));
            break;
            
        case "EndGame":
            var path = "/api/end";
            
            var request = httpRequest(host, path);
            var speechOutput = "Game has ended. Server response is, " + request;
            callback(session.attributes,
                buildSpeechletResponse(speechOutput, "", true));
            break;
        
    }
    speechOutput = "Answer is, " + request;
}

// ------- Helper functions to build responses -------
function httpRequest(host, path) {
    var http = require('http');
    var options = {
        host: host,
        path: path
    };
    var callback = function(response) {
        var str = '';
        response.on('data', function (chunk) {
            str += chunk;
        });
        response.on('end', function () {
            console.log(str);
        });
    }
    var request = http.request(options, callback).end();
    return request.status;
}

function buildSpeechletResponse(output, repromptText, shouldEndSession) {
    return {
        outputSpeech: {
            type: "PlainText",
            text: output
        },
        reprompt: {
            outputSpeech: {
                type: "PlainText",
                text: repromptText
            }
        },
        shouldEndSession: shouldEndSession
    };
}

function buildResponse(sessionAttributes, speechletResponse) {
    return {
        version: "1.0",
        sessionAttributes: sessionAttributes,
        response: speechletResponse
    };
}
