<!--David Wandratsch, 3BHIT-->

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Klassen</title>
    <link rel="stylesheet" type="text/css" href="Wandratsch_UE4.css">
</head>

<body>
    <header>
        <h1>Inventarsliste mit Klassen umgesetzt</h1>
    </header>
    <main>
        <?php
        // creating class Vegetable
        class Vegetable
        {
            // defining variables for the product
            private $name;
            private $price;
            private $amount;
            private $origin;
            private $pricePerKilo;

            // function to create / construct new vegetables
            function __construct($name, $price, $amount, $origin, $pricePerKilo)
            {
                $this->name = $name;
                $this->price = $price;
                $this->amount = $amount;
                $this->origin = $origin;
                $this->pricePerKilo = $pricePerKilo;
            }

            // function to check if a reorder is necessary
            private function checkForReorder()
            {
                // if the amount of the product is under 100 a warning is displayed that the product needs to be reordered
                if ($this->amount < 100) {
                    echo "<b>Achtung: Muss nachbestellt werden</b><br>";
                }
            }

            // printing the product with all its details
            public function printProduct()
            {
                echo "Produktname: $this->name<br>";
                echo "Preis: € $this->price<br>";
                echo "Anzahl: $this->amount<br>";
                echo "Herkunftsland: $this->origin<br>";
                echo "Preis pro kg: $this->pricePerKilo/kg<br>";
                $this->checkForReorder();
                echo "<br>";
            }
        }

        // creating class Fruit
        class Fruit
        {
            // defining the variables for the product
            private $name;
            private $price;
            private $amount;
            private $origin;
            private $pricePerKilo;

            // function to create / construct new fruits
            function __construct($name, $price, $amount, $origin, $pricePerKilo)
            {
                $this->name = $name;
                $this->price = $price;
                $this->amount = $amount;
                $this->origin = $origin;
                $this->pricePerKilo = $pricePerKilo;
            }

            // function to check if a reorder is necessary
            private function checkForReorder()
            {
                // if the amount of the product is under 100 a warning is displayed that the product needs to be reordered
                if ($this->amount < 100) {
                    echo "<b>Achtung: Muss nachbestellt werden</b><br>";
                }
            }

            // printing the product with all its details
            public function printProduct()
            {
                echo "Produktname: $this->name<br>";
                echo "Preis: € $this->price<br>";
                echo "Anzahl: $this->amount<br>";
                echo "Herkunftsland: $this->origin<br>";
                echo "Preis pro kg: $this->pricePerKilo/kg<br>";
                $this->checkForReorder();
                echo "<br>";
            }
        }

        // creating class Sortiment
        class Sortiment
        {
            // creating a new array for our sortiment
            private $sortiment = array();

            // function to create new products with their respective values
            function __construct()
            {
                $this->sortiment[0] = new Fruit("Apfel", 1.99, 70, "Österreich", 0.99);
                $this->sortiment[1] = new Fruit("Birne", 0.99, 200, "Österreich", 0.99);
                $this->sortiment[2] = new Fruit("Erdbeeren", 1.49, 45, "Italien", 2.99);
                $this->sortiment[3] = new Vegetable("Tomate", 2.49, 400, "Italien", 1.25);
                $this->sortiment[4] = new Vegetable("Zucchini", 1.49, 20, "Spanien", 0.99);
                $this->sortiment[5] = new Vegetable("Karotten", 1.79, 200, "China", 0.89);
                $this->sortiment[6] = new Vegetable("Kartoffeln", 2.99, 110, "Südamerika", 0.59);
                $this->sortiment[7] = new Vegetable("Kürbis", 3.49, 70, "Österreich", 1.19);
            }

            // asking for the number of products in our sortiment
            private function getNumOfProducts()
            {
                return sizeof($this->sortiment);
            }

            // printing the whole sortiment
            public function printSortiment()
            {
                // assigning the value of the called function getNumOfProducts
                $numOfProducts = $this->getNumOfProducts();
                echo "<h3>Anzahl an Produkten im Sortiment: $numOfProducts</h3><br>";

                // going through the whole sortiment and print every product including its details
                foreach ($this->sortiment as $product) {
                    $product->printProduct();
                }
            }
        }

        // creating a new sortiment
        $sortiment = new Sortiment();

        echo "<p>";
        $sortiment->printSortiment();   // calling the print function of the class sortiment
        echo "</p>";
        ?>
    </main>

    <footer>
        <hr>&copy; 2021 by David Wandratsch, 3BHIT
    </footer>
</body>

</html>