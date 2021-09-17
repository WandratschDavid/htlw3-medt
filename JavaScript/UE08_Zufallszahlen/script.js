// Wandratsch David, 3BHIT

/*
function getInputLowerBound() 
{
    var lower, text;
    
    lower = document.getElementById("lowerBound").value;
    
    if (isNaN(lower)) 
    {
        text = "Input not valid";
    }
    else
    {
        text = "Input OK";
        return lower;
    }
    
    document.getElementById("validationLowerBound").innerHTML = text;
}

function getInputUpperBound() 
{
    return document.getElementById("upperBound").value;
}

function getInputAmount()
{
    return document.getElementById("amount").value;
}



function generateRandomNumbers(numbers)
{
    var numbers = [];
    
    var lower = document.getElementById("lowerBound").value;
    
    var upper = document.getElementById("upperBound").value;
    
    var amount = document.getElementById("amount").value;
    
    
    for(var i = 0; i <= amount; i++)
    {
        numbers[i] = (lower + Math.round(upper * Math.random()));
    }
    
    return numbers;
}


function printNumbers(numbers)
{
    for(var i = 0; i < numbers.length; i++)
    {
        document.write("<p>" + numbers[i] + "</p>");
    }
}

*/

function getRandomNumber(lower, upper)
{
    let lower = document.getElementById("lowerBound").value;
    
    let upper = document.getElementById("upperBound").value;
    
    let getRandom = Math.round(upper * Math.random()) + lower;
        
    return getRandom;
}