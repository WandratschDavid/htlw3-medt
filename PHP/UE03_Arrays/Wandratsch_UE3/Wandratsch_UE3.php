<!--David Wandratsch, 3BHIT-->

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Arrays</title>
    <link rel="stylesheet" type="text/css" href="Wandratsch_UE3.css">
</head>

<body>
    <header>
        <h1>Inventarsliste</h1>
    </header>
    <main>
        <?php
        $products = array();
        $products[0]['Produkt'] = 'Apfel';
        $products[0]['Preis'] = 1.99;
        $products[0]['Anzahl'] = 70;
        $products[1]['Produkt'] = 'Birne';
        $products[1]['Preis'] = 0.99;
        $products[1]['Anzahl'] = 200;
        $products[2]['Produkt'] = 'Tomate';
        $products[2]['Preis'] = 2.49;
        $products[2]['Anzahl'] = 400;
        $products[3]['Produkt'] = 'Zucchini';
        $products[3]['Preis'] = 1.49;
        $products[3]['Anzahl'] = 20;
        $products[4]['Produkt'] = 'Karotten';
        $products[4]['Preis'] = 1.79;
        $products[4]['Anzahl'] = 200;
        $products[5]['Produkt'] = 'Kartoffeln';
        $products[5]['Preis'] = 1.99;
        $products[5]['Anzahl'] = 110;
        $products[6]['Produkt'] = 'Kürbis';
        $products[6]['Preis'] = 3.49;
        $products[6]['Anzahl'] = 70;

        foreach ($products as $ebene1) 
        {
            echo "<div>";
            foreach ($ebene1 as $feldname => $ebene2) 
            {
                echo "" . $feldname . ": " . $ebene2 . "<br>\n";

                if ($feldname == 'Anzahl') 
                {
                    if ($ebene2 < 100) 
                    {
                        echo "<b>Achtung: Muss nachbestellt werden!</b><br>\n";
                    }
                }
            }
            echo "</div><br>\n";
        }
        ?>
    </main>

    <footer>
        <hr>&copy; 2021 by David Wandratsch, 3BHIT
    </footer>
</body>

</html>