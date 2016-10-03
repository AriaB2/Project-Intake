//Javascript for filtering out the objects pulled in by the database

var lengthOfResults = $(".search-result").length;
var results = new Array(lengthOfResults); //An array of every result including duplicates.
var displayableResults;
var resultsToDisplay = 6; //How many results to display on a page.
var theCurrentPage = 0; //The current page that the user is on.

//Initialization 
getResults(); //Fills the results array with the results.
initialPageSetup(); //Initializes the page structure on the entrance of the page.

$("#search").on("keyup", function(eventHandler){

    var nonmatches = matchResultsFalse();
    var matches = matchResultsTrue();

    clearMatchesTest(matches, nonmatches);
    //displayableResults = matches.slice();
    //displayCurrentPage();
});

$(".results-button").click(function(){

    //Clear the current page
    clearOldPage();
    //Get the number of the button to change the page.
    var IDofCurrentButton = $(this).attr("id");
    theCurrentPage = IDofCurrentButton.split("-")[1] - 1;
    //Display the new page
    displayCurrentPage();

})

function matchResultsFalse(){

    var theRegex = buildRegex();
    var matches = new Array();

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
        
    }

    for(i = 0; i < theMatches.length; i++){

        var currentMatch = $($(".search-result")[theMatches[i]]);
        currentMatch.css("display", "inline-block");
    }
}

function clearMatchesTest(theMatches, theNonMatches){

    //Resetting the displayableResults to match what the user is searching for.
    displayableResults = theMatches; 
    console.log(displayableResults);
    theCurrentPage = 0;
    var numberOfPages = getNumberOfPages();

    displayCorrectButtons(numberOfPages);
    clearOldResults(theNonMatches);
    clearOldPage();
    displayCurrentPage();
}

function buildRegex(){

    var theRegex = new RegExp("^" + $("#search").val() + ".*", "i");

    return theRegex;
}

function getResults(){

    for(i = 0; i < $(".search-result").length; i++){

        results[i] = $($(".search-result")[i]).children().html().trim();
        console.log(results[i]);
    }
}

function initialPageSetup(){

    displayableResults = matchResultsTrue();
    displayCurrentPage();

}

function clearOldResults(theNonMatches){

    var currentMatch;

    for(i = 0; i < $(".search-result").length; i++){

        currentMatch = $($(".search-result")[i]);
        currentMatch.css("display", "none");
    }
}

function clearOldPage(){

    var theFramePosition = (theCurrentPage * resultsToDisplay);
    var currentMatch;

    for(i = 0; i < resultsToDisplay; i++){

        currentMatch = $($(".search-result")[displayableResults[theFramePosition]])
        currentMatch.css("display", "none");
        theFramePosition++;

    }
}

function displayCurrentPage(){

    var theFramePosition = (theCurrentPage * resultsToDisplay);

    for(i = 0; i < resultsToDisplay; i++){

        var currentMatch = $($(".search-result")[displayableResults[theFramePosition]]);
        currentMatch.css("display", "inline-block");
        theFramePosition++;
    }
}

function getNumberOfPages(){

    if(displayableResults.length <= resultsToDisplay){

        return 0;

    }else if((displayableResults.length % resultsToDisplay) == 0){

        return (displayableResults.length / resultsToDisplay);

    }else{

        return (Math.ceil(displayableResults.length / resultsToDisplay));

    }
}

function displayCorrectButtons(numberOfButtons){

    var buttonCount = $(".results-button").length;
    console.log(buttonCount);

    if(numberOfButtons > 0){

        for(i = 0; i < buttonCount; i++){

            if(i < numberOfButtons){

                $($(".results-button")[i]).css("display", "inline-block");

            }else{

                $($(".results-button")[i]).css("display", "none");

            }
        }

    }else{

        for(i = 0; i < buttonCount; i++){

            $($(".results-button")[i]).css("display", "none");

        }
    }
}