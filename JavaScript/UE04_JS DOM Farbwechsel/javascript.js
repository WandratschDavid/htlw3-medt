//Wandratsch David, 3BHIT
var colors = ["red", "orange", "yellow", "green", "blue", "indigo", "purple"];

function modifyColor(elementId) 
{
    let element = document.getElementById(elementId);
    let color = 0;

    setInterval(function()
    {
        if (color === colors.length)
            color = 0;
            element.style.backgroundColor = colors[color++];
    }, 1000);
}