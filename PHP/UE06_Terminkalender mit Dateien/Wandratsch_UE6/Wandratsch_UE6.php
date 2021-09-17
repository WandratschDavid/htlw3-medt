<!--David Wandratsch, 3BHIT-->

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Wandratsch_UE6</title>
    <link rel="stylesheet" type="text/css" href="Wandratsch_UE6.css?v=1">
</head>

<body>
    <header>
        <h1>Terminkalender mit Dateien</h1>
    </header>
    <main>

        <?php
        /**
         *********************************
         * Upload Section of the Website *
         *********************************
         */

        $message;

        // Prüfen, ob der Upload - Button geklickt wurde
        if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
        {
            if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
            {
                // Eigenschaften des hochgeladenen Files
                $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
                $fileName = $_FILES['uploadedFile']['name'];
                $fileSize = $_FILES['uploadedFile']['size'];
                $fileType = $_FILES['uploadedFile']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                // Zusammensetzen des Dateinamens
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                // Dateiendung der Datei überprüfen
                $allowedfileExtensions = array('txt', 'csv');

                if (in_array($fileExtension, $allowedfileExtensions))
                {
                    // Verzeichnis, in das die hochgeladene Datei verschoben werden soll
                    $uploadFileDir = './uploadedFiles/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path))
                    {
                        $message = 'File successfully uploaded!';
                    }
                }
                else
                {
                    echo 'Upload failed! Make sure to use one of the allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            }
            else
            {
                echo 'There was a error during the file upload!<br>';
            }

            // Lesezugriff auf die Datei
            $inputFile = fopen($fileTmpPath, "r") or die(" Unable to open file!");

            // Inhalt der Datei in Array einlesen
            $tmp_array = array();

            do
            {
                $tmp_array = fgetcsv($inputFile, 500, ";", $enclosure = '"');

                if ($tmp_array != NULL)
                {
                    $list_appointments[] = array('Datum' => $tmp_array[0], 'Ort' => $tmp_array[1], 'Band' => $tmp_array[2]);
                }
            }
            while ($tmp_array != NULL);

            fclose($inputFile);
        }

        // Anlegen der bereits bekannten Termine
        $appointments[] = array('Datum' => 20201208, 'Ort' => "Wels", 'Band' => "Warcraft awakes");
        $appointments[] = array('Datum' => 20210311, 'Ort' => "Wien", 'Band' => "Monster legends coming");
        $appointments[] = array('Datum' => 20210628, 'Ort' => "Linz", 'Band' => "Starcraft forever");
        $appointments[] = array('Datum' => 20220628, 'Ort' => "Graz", 'Band' => "Doom arising");
        $appointments[] = array('Datum' => 20230628, 'Ort' => "Graz", 'Band' => "Get out of here");

        /**
         ***********************************
         * Download Section of the Website *
         ***********************************
         */

        // Prüfen, ob der Button geklickt wurde
        if (isset($_POST['downloadBtn']) && $_POST['downloadBtn'] == 'Download')
        {
            // Datei erstellen bzw. öffnen
            $outputFile = fopen("Wandratsch_eventkalender.txt", "w") or die("Datei konnte nicht exportiert werden!");

            // Termine in die Datei schreiben
            foreach ($appointments as $appointment)
            {
                $txt = $appointment['Datum'] . ";" . $appointment['Ort'] . ";" . $appointment['Band'] . "\n";
                fwrite($outputFile, $txt);
            }

            echo "Download exported file: <a href=\"Wandratsch_eventkalender.txt\">Wandratsch_eventkalender.txt</a>";
            fclose($outputFile);
        }

        // Formatierung des Datums in das Format TT.MM.JJJJ
        function datum_deutsch($datum)
        {
            $jahr = substr($datum, 0, 4);
            $monat = substr($datum, 4, 2);
            $tag = substr($datum, -2);

            $datum_deutsch = $tag . "." . $monat . "." . $jahr;

            return ($datum_deutsch);
        }

        // Wechseln der Hintergrundfarbe der Tabellenelemente
        function farbwechsel($zeilenr)
        {
            if (bcmod($zeilenr, '2') == 0) 
            {
                $hintergrundfarbe = ' bgcolor="#505050" ';
            }
            else
            {
                $hintergrundfarbe = ' bgcolor="#bb0000" ';
            }

            return ($hintergrundfarbe);
        }

        foreach ($appointments as $nr => $inhalt) 
        {
            $datum[$nr] = strtolower($inhalt['Datum']);
            $ort[$nr] = strtolower($inhalt['Ort']);
            $band[$nr] = strtolower($inhalt['Band']);
        }

        // Abfrage der Art der Sortierung
        switch ($_GET['sortierung']) 
        {
            case ("d"):
                // Sortierung nach Datum und Ort aufsteigend
                array_multisort($datum, SORT_ASC, $ort, SORT_ASC, $appointments);
                break;

            case ("o"):
                // Sortierung nach Ort aufsteigend
                array_multisort($ort, SORT_ASC, $appointments);
                break;

            case ("b"):
                // Sortierung nach Band aufsteigend
                array_multisort($band, SORT_ASC, $appointments);
                break;

            case ("da"):
                // Sortierung nach Datum und Ort aufsteigend
                array_multisort($datum, SORT_DESC, $appointments);
                break;

            case ("oa"):
                // Sortierung nach Ort aufsteigend
                array_multisort($ort, SORT_DESC, $appointments);
                break;

            case ("ba"):
                // Sortierung nach Band aufsteigend
                array_multisort($band, SORT_DESC, $appointments);
                break;

            default:
                // Sortierung nach Datum
                array_multisort($datum, SORT_ASC, $ort, SORT_ASC, $appointments);
        }


        if (isset($_SESSION['message']) && $_SESSION['message']) 
        {
            echo '<p class="notification">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }


        // Inhalt der Tabelle ausgeben
        function ausgabe_tabelle($appointments)
        {
            $zeilenr = 1;

            echo '<table>';

            echo '<tr>';
            echo '<th id="colname">';
            echo ' ';
            echo '</th>';

            echo '<th id="colname">';
            echo 'Datum ';
            echo '<a href="Wandratsch_UE6.php?sortierung=d">↓</a>';
            echo '<a href="Wandratsch_UE6.php?sortierung=da">↑</a>';
            echo '</th>';

            echo '<th id="colname">';
            echo 'Band ';
            echo '<a href="Wandratsch_UE6.php?sortierung=b">↓</a>';
            echo '<a href="Wandratsch_UE6.php?sortierung=ba">↑</a>';
            echo '</th>';

            echo '<th id="colname">';
            echo 'Ort ';
            echo '<a href="Wandratsch_UE6.php?sortierung=o">↓</a>';
            echo '<a href="Wandratsch_UE6.php?sortierung=oa">↑</a>';
            echo '</th>';
            echo '</tr>';

            foreach ($appointments as $inhalt) 
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
        }

        ausgabe_tabelle($appointments);
        ?>

        <form action="Wandratsch_UE6.php" method="post" enctype="multipart/form-data">
            Kalendereinträge importieren: <br>
            <input type="file" name="uploadedFile" id="file-upload">
            <br>
            <input type="submit" value="Upload" name="uploadBtn">
        </form>
        <form action="Wandratsch_UE6.php" method="post">
            <input type="submit" value="Download" name="downloadBtn">
        </form>
    </main>
    <footer>
        <hr>&copy; 2021 by David Wandratsch, 3BHIT
    </footer>
</body>

</html>