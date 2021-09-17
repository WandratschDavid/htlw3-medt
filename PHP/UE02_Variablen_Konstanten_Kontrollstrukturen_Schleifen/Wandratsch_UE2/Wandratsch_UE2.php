<!-- David Wandratsch, 3BHIT -->
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Übung 02 - Preisberechnung</title>
    <link rel="stylesheet" type="text/css" href="Wandratsch_UE2.css"/>
</head>

<body>
    <h1>Übung 02 - Preisberechnung</h1>

    <?php
    //defining constant variables
    const mwst = 1.2;
    const discount_002Percent = 0.02;
    const discount_0021Percent = 0.021;
    const discount_0022Percent = 0.022;
    const discount_0023Percent = 0.023;
    const discount_0024Percent = 0.024;

    //defining all the variables and it belonging names
    $pc = "PC";
    $monitor = "Monitor";
    $webcam = "Webcam";
    $printer = "Drucker";
    $external_drive = "Externe Festplatte";

    //defining the prices for all the products
    const price_pc = 459;
    const price_monitor = 399;
    const price_webcam = 19.9;
    const price_printer = 89.95;
    const price_external_drive = 43.33;

    //defining the amount of each item
    $amount_pc = 100;
    $amount_monitor = 150;
    $amount_webcam = 40;
    $amount_printer = 10;
    $amount_external_drive = 100;

    //checking if the item amount exceeds 100 --> 2% discount 
    function getSumPerItem($price_item, $amount)
    {
        $sum = $price_item * $amount;

        if($amount >= 100)
        {
            $sum_final = $sum - ($sum * 0.02);

            $difference = $sum - $sum_final;

            return [$sum, 0.02, $difference];
        }

        return [$sum, 0, 0];
    }

    //assigning variables to the return values of the called function
    [$price_sum_pcs, $discount_pcs, $discount_difference_pcs] = getSumPerItem(price_pc, $amount_pc);
    [$price_sum_monitors, $discount_monitors, $discount_difference_monitors] = getSumPerItem(price_monitor, $amount_monitor);
    [$price_sum_webcams, $discount_webcams, $discount_difference_webcams] = getSumPerItem(price_webcam, $amount_webcam);
    [$price_sum_printers, $discount_printers, $discount_difference_printers] = getSumPerItem(price_printer, $amount_printer);
    [$price_sum_external_drives, $discount_external_drives, $discount_difference_external_drives] = getSumPerItem(price_external_drive, $amount_external_drive);

    //adding all the discount values together and assigning them to the variables
    $discount_all = $discount_pcs + $discount_monitors + $discount_webcams + $discount_printers + $discount_external_drives;
    $discount_difference_all = $discount_difference_pcs + $discount_difference_monitors + $discount_difference_webcams + $discount_difference_printers + $discount_difference_external_drives;

    //function with switch-case to check for the discount
    function getFinalSum($gesamt_price)
    {
        switch ($gesamt_price) 
        {
            case ($gesamt_price >= 60000):
                $gesamt_price = $gesamt_price - ($gesamt_price * discount_002Percent);
                return [$gesamt_price, discount_002Percent];
                break;

            case ($gesamt_price >= 70000):
                $gesamt_price = $gesamt_price - ($gesamt_price * discount_0021Percent);
                return [$gesamt_price, discount_0021Percent];
                break;

            case ($gesamt_price >= 80000):
                $gesamt_price = $gesamt_price - ($gesamt_price * discount_0022Percent);
                return [$gesamt_price, discount_0022Percent];
                break;

            case ($gesamt_price >= 90000):
                $gesamt_price = $gesamt_price - ($gesamt_price * discount_0023Percent);
                return [$gesamt_price, discount_0023Percent];
                break;

            case ($gesamt_price >= 100000):
                $gesamt_price = $gesamt_price - ($gesamt_price * discount_0024Percent);
                return [$gesamt_price, discount_0024Percent];
                break;
            
            default:
                return [$gesamt_price, 0];
                break;
        }
    }

    //suming up all the prices of each item and assigning the value to a new variable
    $gesamt_netto = $price_sum_pcs + $price_sum_monitors + $price_sum_webcams + $price_sum_printers + $price_sum_external_drives;
    [$gesamt_netto_with_discount, $discount] = getFinalSum($gesamt_netto);
    $gesamt_brutto = $gesamt_netto_with_discount * mwst;
    
    //returning only the discount returned from the function
    function getDiscount($gesamt_price)
    {
        [$gesamt_price_with_discount, $discount] = getFinalSum($gesamt_price);

        return $discount;
    }
    ?>

    <table>
        <thead>
            <tr>
                <td>Produkt</td>
                <td>Anzahl</td>
                <td>Preis (netto)</td>
                <td>Preis (brutto)</td>
                <td>Gesamt (netto)</td>
                <td>Gesamt (brutto)</td>
                <td>Ersparnis (Prozent)</td>
                <td>Ersparnis</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $pc; ?></td>
                <td><?php echo $amount_pc; ?></td>
                <td><?php echo price_pc; ?></td>
                <td><?php echo price_pc * mwst; ?></td>
                <td><?php echo $price_sum_pcs; ?></td>
                <td><?php echo $price_sum_pcs * mwst; ?></td>
                <td><?php echo $discount_pcs + getDiscount($price_sum_pcs); ?></td>
                <td><?php echo $discount_difference_pcs; ?></td>
            </tr>
            <tr>
                <td><?php echo $monitor; ?></td>
                <td><?php echo $amount_monitor; ?></td>
                <td><?php echo price_monitor; ?></td>
                <td><?php echo price_monitor * mwst; ?></td>
                <td><?php echo $price_sum_monitors; ?></td>
                <td><?php echo $price_sum_monitors * mwst; ?></td>
                <td><?php echo $discount_monitors + getDiscount($price_sum_monitors); ?></td>
                <td><?php echo $discount_difference_monitors; ?></td>
            </tr>
            <tr>
                <td><?php echo $webcam; ?></td>
                <td><?php echo $amount_webcam; ?></td>
                <td><?php echo price_webcam; ?></td>
                <td><?php echo price_webcam * mwst; ?></td>
                <td><?php echo $price_sum_webcams; ?></td>
                <td><?php echo $price_sum_webcams * mwst; ?></td>
                <td><?php echo $discount_webcams + getDiscount($price_sum_webcams); ?></td>
                <td><?php echo $discount_difference_webcams; ?></td>
            </tr>
            <tr>
                <td><?php echo $printer; ?></td>
                <td><?php echo $amount_printer; ?></td>
                <td><?php echo price_printer; ?></td>
                <td><?php echo price_printer * mwst; ?></td>
                <td><?php echo $price_sum_printers; ?></td>
                <td><?php echo $price_sum_printers * mwst; ?></td>
                <td><?php echo $discount_printers + getDiscount($price_sum_printers); ?></td>
                <td><?php echo $discount_difference_printers; ?></td>
            </tr>
            <tr>
                <td><?php echo $external_drive; ?></td>
                <td><?php echo $amount_external_drive; ?></td>
                <td><?php echo price_external_drive; ?></td>
                <td><?php echo price_external_drive * mwst; ?></td>
                <td><?php echo $price_sum_external_drives; ?></td>
                <td><?php echo $price_sum_external_drives * mwst; ?></td>
                <td><?php echo $discount_external_drives + getDiscount($price_sum_external_drives); ?></td>
                <td><?php echo $discount_difference_external_drives; ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr id="gesamt">
                <td colspan="4"></td>
                <td><?php echo number_format($gesamt_netto_with_discount, 2, '.', ''); ?></td>
                <td><?php echo number_format($gesamt_brutto, 2, '.', ''); ?></td>
                <td><?php echo $discount_all; ?></td>
                <td><?php echo $discount_difference_all; ?></td>
            </tr>
        </tfoot>
    </table>

    <footer>
        <hr>&copy; David Wandratsch, 3BHIT
    </footer>
</body>

</html>