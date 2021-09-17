//Wandratsch David, 3BHIT
var lebensmittel = [
    {
        Art: "Obst",
        Artikelname: "Äpfel",
        Packungsgroesse: 6,
        Einkaufspreis: 1.809,
        Verkaufspreis: null,
        Anzahl: 10
    },
    {
        Art: "Gemüse",
        Artikelname: "Karotten",
        Packungsgroesse: 12,
        Einkaufspreis: 1.627,
        Verkaufspreis: null,
        Anzahl: 2
    },
    {
        Art: "Gemüse",
        Artikelname: "Zucchini",
        Packungsgroesse: 4,
        Einkaufspreis: 1.354,
        Verkaufspreis: null,
        Anzahl: 1
    },
    {
        Art: "Gemüse",
        Artikelname: "Kaisergemüse",
        Packungsgroesse: 1,
        Einkaufspreis: 1.90,
        Verkaufspreis: null,
        Anzahl: 3
    },
    {
        Art: "Obst",
        Artikelname: "Bananen",
        Packungsgroesse: 5,
        Einkaufspreis: 0.90,
        Verkaufspreis: null,
        Anzahl: 1
    }
];

function addMwst(mwst)
{
    for (let i = 0; i < lebensmittel.length; i++) 
    {
        lebensmittel[i].Verkaufspreis = (lebensmittel[i].Einkaufspreis * mwst).toFixed(2);
    }
}

addMwst(1.1);

lebensmittel.forEach(function (element, index) 
{
    document.write("<tr><td class='thead'>Indizes</td><td class='thead'>Value</td></tr>");
    for (key in element) document.write("<tr>", "<td>", key, "</td>", "<td>", element[key], "</td>", "</tr>");
});