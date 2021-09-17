//Wandratsch David, 3BHIT
let myArray = [1, 2.2, 3, 4, "apfel", "birne", 7, 8 ,9, 9.03];

function printArray() 
{
    document.write("[");
    
    myArray.forEach(function (element, index) 
    {
        document.write(element, index == myArray.length - 1 ? "" : ", ");
    });
    
    document.write("]");
}

//listing the number of elements
document.write("<h3>Anzahl der Elemente:</h3>", myArray.length, "<hr>");

//print the array
document.write("<h3>Ausgabe des Arrays:</h4>");
printArray();
document.write("<hr>");

//deleting the element with index[2]
document.write("<h3>Löschen des zweiten Elements:</h3>");
myArray.splice(2,1);
printArray();
document.write("<hr>");

//searching for "birne"
document.write("<h3>Suchen des Elements \"birne\":</h3>");
let birneIndex = myArray.indexOf("birne");
document.write("birne: " + "[" + birneIndex + "]");
document.write("<hr>");

//deleting the element "birne"
document.write("<h3>Löschen des Elements \"birne\":</h3>");
myArray.splice(birneIndex, 1);
printArray();
document.write("<hr>");

//inserting the element "anfang" on the beginning of the array
document.write("<h3>Element \"anfang\" am Anfang hinzufügen:</h3>");
myArray.unshift("anfang");
printArray();
document.write("<hr>");

//inserting the element "ende" at the beginning of the array
document.write("<h3>Element \"ende\" am Anfang hinzufügen:</h3>");
myArray.push("ende");
printArray();
document.write("<hr>");