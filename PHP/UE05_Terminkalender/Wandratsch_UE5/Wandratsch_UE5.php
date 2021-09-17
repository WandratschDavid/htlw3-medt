<!--David Wandratsch, 3BHIT-->

<?php
echo '<!DOCTYPE html>';
echo '<html lang="de">';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>PHP - Wandratsch_UE5</title>';
echo '<link rel="stylesheet" type="text/css" href="Wandratsch_UE5.css?v=1">';
echo '</head>';

echo '<body>';
echo '<header>';
echo '<h1>Terminkalender</h1>';
echo '</header>';
echo '<main>';

$termin[] = array(
    'Datum' => 20201208,
    'Ort'   => "Wels",
    'Band'  => "Warcraft awakes"
);

$termin[] = array(
    'Datum' => 20210311,
    'Ort'   => "Wien",
    'Band'  => "Monster legends coming"
);

$termin[] = array(
    'Datum' => 20210628,
    'Ort'   => "Linz",
    'Band'  => "Starcraft forever"
);

$termin[] = array(
    'Datum' => 20220628,
    'Ort'   => "Graz",
    'Band'  => "Doom arising"
);

$termin[] = array(
    'Datum' => 20230628,
    'Ort'   => "Graz",
    'Band'  => "Get out of here"
);

foreach ($termin as $nr => $inhalt) 
{
    $datum[$nr] = strtolower($inhalt['Datum']);
    $ort[$nr] = strtolower($inhalt['Ort']);
    $band[$nr] = strtolower($inhalt['Band']);
}

switch ($_GET['sortierung']) 
{
    case ("d"):
        // Sortierung nach Datum und Ort aufsteigend
        array_multisort($datum, SORT_ASC, $ort, SORT_ASC, $termin);
        break;

    case ("o"):
        // Sortierung nach Ort aufsteigend
        array_multisort($ort, SORT_ASC, $termin);
        break;

    case ("b"):
        // Sortierung nach Band aufsteigend
        array_multisort($band, SORT_ASC, $termin);
        break;

    case ("da"):
        // Sortierung nach Datum und Ort aufsteigend
        array_multisort($datum, SORT_DESC, $termin);
        break;

    case ("oa"):
        // Sortierung nach Ort aufsteigend
        array_multisort($ort, SORT_DESC, $termin);
        break;

    case ("ba"):
        // Sortierung nach Band aufsteigend
        array_multisort($band, SORT_DESC, $termin);
        break;

    default:
        // Sortierung nach Datum
        array_multisort($datum, SORT_ASC, $ort, SORT_ASC, $termin);
}

function ausgabe_tabelle($termin)
{
    $zeilenr = 1;

    echo '<table>';

    echo '<tr>';
    echo '<th id="colname">';
    echo ' ';
    echo '</th>';

    echo '<th id="colname">';
    echo 'Datum ';
    echo '<a href="Wandratsch_UE5.php?sortierung=d">↓</a>';
    echo '<a href="Wandratsch_UE5.php?sortierung=da">↑</a>';
    echo '</th>';

    echo '<th id="colname">';
    echo 'Band ';
    echo '<a href="Wandratsch_UE5.php?sortierung=b">↓</a>';
    echo '<a href="Wandratsch_UE5.php?sortierung=ba">↑</a>';
    echo '</th>';

    echo '<th id="colname">';
    echo 'Ort ';
    echo '<a href="Wandratsch_UE5.php?sortierung=o">↓</a>';
    echo '<a href="Wandratsch_UE5.php?sortierung=oa">↑</a>';
    echo '</th>';
    echo '</tr>';

    foreach ($termin as $inhalt) 
    {
        echo '<tr';
        echo farbwechsel($zeilenr);
        echo '>';
        echo '<td>';
        echo $zeilenr . ".";
        echo '</td>';

        echo '<td>';
        echo datum_deutsch($inhalt['Datum']);
        echo '</td>';

        echo '<td>';
        echo $inhalt['Band'];
        echo '</td>';

        echo '<td>';
        echo $inhalt['Ort'];
        echo '</td>';
        echo '</tr>';

        $zeilenr++;
    }
    echo '</table>';
}

ausgabe_tabelle($termin);

function datum_deutsch($datum)
{
    $jahr = substr($datum, 0, 4);
    $monat = substr($datum, 4, 2);
    $tag = substr($datum, -2);

    $datum_deutsch = $tag . "." . $monat . "." . $jahr;

    return ($datum_deutsch);
}

function farbwechsel($zeilenr)
{
    if (bcmod($zeilenr, '2') == 0) {
        $hintergrundfarbe = ' bgcolor="#505050" ';
    } else {
        $hintergrundfarbe = ' bgcolor="#bb0000" ';
    }

    return ($hintergrundfarbe);
}

echo '</main>';
echo '<footer>';
echo '<hr>&copy; 2021 by David Wandratsch, 3BHIT';
echo '</footer>';
echo '</body>';
echo '</html>';
?>