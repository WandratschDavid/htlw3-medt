// Wandratsch David, 3BHIT
var clicked = true;

function modify(elementID) 
{
    document.getElementById(elementID).style = "background-color: " + ((clicked = !clicked) ? "red" : "green");
    document.getElementById(elementID).innerText = (clicked ? "Christmas" : "Merry");
}