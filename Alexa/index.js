'use strict';
var request = require("request");

function buildSpeechletResponse(title, output, repromptText, shouldEndSession) {
    return {
        outputSpeech: {
            type: 'PlainText',
            text: output,
        },
        card: {
            type: 'Simple',
            title: `SessionSpeechlet - ${title}`,
            content: `SessionSpeechlet - ${output}`,
        },
        reprompt: {
            outputSpeech: {
                type: 'PlainText',
                text: repromptText,
            },
        },
        shouldEndSession,
    };
}

function buildResponse(sessionAttributes, speechletResponse) {
    return {
        version: '1.0',
        sessionAttributes,
        response: speechletResponse,
    };
}

function getWelcomeResponse(callback) {
    const sessionAttributes = {};
    const cardTitle = 'Welcome';
    const speechOutput = 'Welcome to the Baeocat Break In.';
    const repromptText = 'You can start a game by saying, ' +
        'begin game test';
    const shouldEndSession = false;

    callback(sessionAttributes,
        buildSpeechletResponse(cardTitle, speechOutput, repromptText, shouldEndSession));
}

function handleSessionEndRequest(callback) {
    const cardTitle = 'Game Ended';
    const speechOutput = 'Thank you for playing Baeocat Break In.';
    const shouldEndSession = true;

    callback({}, buildSpeechletResponse(cardTitle, speechOutput, null, shouldEndSession));
}

function inSession(intent, session, callback) {
    const cardTitle = intent.name;
    const host = "https://testing.atodd.io";

    switch(intent.name){
      case "BeginGame":
      var gameName = intent.slots.GameName.value;
        var route = "/api/begin";
        var url = {url: host+route, headers: {'game-name' : gameName}};
        apiRequest(url, function(error, response, body) {
            console.info(body);
            var data = JSON.parse(body);
            var result = data['game-name'];
            var speechOutput = "Your game " + result + " has been created!";
            callback({}, buildSpeechletResponse(cardTitle, speechOutput, '', true));
        });
        break;
      case "PlayGame":
        var route = "/api/play";
        break;
      case "EndGame":
        var route = "/api/end";
        break;
    }
}

function apiRequest(url, callback) {
    console.log("Starting request to " + url.url);
    request.post(url, function(error, response, body) {
        callback(error, response, body);
    });
}

function onSessionStarted(sessionStartedRequest, session) {
    console.log(`onSessionStarted requestId=${sessionStartedRequest.requestId}, sessionId=${session.sessionId}`);
}

function onLaunch(launchRequest, session, callback) {
    console.log(`onLaunch requestId=${launchRequest.requestId}, sessionId=${session.sessionId}`);
    getWelcomeResponse(callback);
}

function onIntent(intentRequest, session, callback) {
    console.log(`onIntent requestId=${intentRequest.requestId}, sessionId=${session.sessionId}`);

    const intent = intentRequest.intent;
    const intentName = intentRequest.intent.name;

    if (intentName === 'BeginGame' || intentName === 'EndGame' || intentName === 'PlayGame') {
        inSession(intent, session, callback);
    } else {
        callback({}, buildSpeechletResponse("Beocat Break In", "Invalid command, " + intentName, true));
        throw new Error('Invalid intent');
    }
}

function onSessionEnded(sessionEndedRequest, session) {
    console.log(`onSessionEnded requestId=${sessionEndedRequest.requestId}, sessionId=${session.sessionId}`);
}

exports.handler = (event, context, callback) => {
    try {
        console.log(`event.session.application.applicationId=${event.session.application.applicationId}`);
        if (event.session.application.applicationId !== 'amzn1.ask.skill.25e6ef34-e26b-466b-85d3-7760e5dcdb97') {
            callback('Invalid Application ID');
        }
        if (event.session.new) {
            onSessionStarted({
                requestId: event.request.requestId
            }, event.session);
        }
        if (event.request.type === 'LaunchRequest') {
            onLaunch(event.request,
                event.session,
                (sessionAttributes, speechletResponse) => {
                    callback(null, buildResponse(sessionAttributes, speechletResponse));
                });
        } else if (event.request.type === 'IntentRequest') {
            onIntent(event.request,
                event.session,
                (sessionAttributes, speechletResponse) => {
                    callback(null, buildResponse(sessionAttributes, speechletResponse));
                });
        } else if (event.request.type === 'SessionEndedRequest') {
            onSessionEnded(event.request, event.session);
            callback();
        }
    } catch (err) {
        callback(err);
    }
};
