//Javascript for filtering out the objects pulled in by the database

var lengthOfResults = $(".search-result").length;
var results = new Array(lengthOfResults);
getResults();

$("#search").on("keyup", function(eventHandler){

    var nonmatches = matchResultsFalse();
    var matches = matchResultsTrue();

    clearMatches(matches, nonmatches);
});

function matchResultsFalse(){

    var theRegex = buildRegex();
    var matches = new Array();

    console.log(theRegex);

    for(i = 0; i < lengthOfResults; i++){

        if(theRegex.test(results[i]) == false) {
            matches.push(i);
        }
    }

    return matches;
}

function matchResultsTrue(){

    var theRegex = buildRegex();
    var matches = new Array();

    for(i = 0; i < lengthOfResults; i++){

        if(theRegex.test(results[i]) == true) {
            matches.push(i);
        }
    }

    return matches;
}

function clearMatches(theMatches, theNonMatches){

    for(i = 0; i < theNonMatches.length; i++){

        var currentMatch = $($(".search-result")[theNonMatches[i]]);
        currentMatch.css("display", "none");
        //
    }

    for(i = 0; i < theMatches.length; i++){

        var currentMatch = $($(".search-result")[theMatches[i]]);
        currentMatch.css("display", "inline-block");
    }
}

function buildRegex(){

    var theRegex = new RegExp("^" + $("#search").val() + ".*", "i");

    return theRegex;
}

function getResults(){

    for(i = 0; i < $(".search-result").length; i++){

        results[i] = $(".search-result")[i].innerHTML.trim();
    }
}