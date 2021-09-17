//Wandratsch David, 3BHIT

//Printing 56.6
print(56.6);

//Printing 33.5
print(33.5);

//Printing 2.01
print(2.01);

//Printing 677.3
print(677.3);

//Printing chosen number 01 3.14
print(3.14);

//Printing chosen number 02 13.741
print(13.741);

//Printing chosen number 03 28.9
print(28.9);

//Printing "34"
print("34");


function calcVolume(a)
{
    let volume = a * a * a;
    return result;
}

function calcSurface(a)
{
    let surface = 6 * a * a;
    return result;
}

function print(a)
{
    var a = 3.14;
    var volume = calcVolume(a).toFixed(2);
    var surface = calcSurface(a).toFixed(2);
    document.write("<tr><td>" + a + "</td><td>" + volume + "</td><td>" + surface + "</td></tr>");
}