<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $image;
        function worthBuying($max_price, $max_mileage)
           {
               return $this->price < ($max_price + 100) && $this->miles < ($max_mileage + 100);
           }

        function __construct($car_model, $car_price, $car_miles, $car_image)
        {
            $this->make_model = $car_model;
            $this->price = $car_price;
            $this->miles = $car_miles;
            $this->image = $car_image;
        }

        function setModel($new_model)
        {
            $this->make_model = $new_model;
        }

        function getModel()
        {
            return $this->make_model;
        }

        function setPrice($new_price)
        {
            $float_price = (float) $new_price;
            if ($float_price != 0) {
              $formatted_price = number_format($float_price, 2);
              $this->price = $formatted_price;
            }
        }

        function getPrice()
        {
            return $this->price;
        }

        function setMiles($new_miles)
        {
            $float_miles = (float) $new_miles;
            if ($float_miles != 0) {
              $formatted_miles = number_format($float_miles, 2);
              $this->miles = $formatted_miles;
            }
        }

        function getMiles()
        {
            return $this->miles;
        }

        function setImage($new_image)
        {
            $this->image = $new_image;
        }

        function getImage()
        {
            return $this->image;
        }
    }

    $porsche = new Car("2014 Porsche 911", 114991, 7864, "images/porsche.jpg");
    $ford = new Car("2011 Ford F450", 55995, 14241, "images/ford.jpeg");
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "images/lexus.jpeg");
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "images/mercedes1.jpeg");

    $porsche->setModel("2013 Porsche");
    $ford->setPrice(15000.39218);
    $lexus->setMiles(40000.9432);
    $mercedes->setImage("images/mercedes2.jpeg");

    $cars = array($porsche, $ford, $lexus, $mercedes);

    $cars_matching_search = array();
    foreach ($cars as $car) {
        if ($car->worthBuying($_GET['price'], $_GET['mileage'])) {
            array_push($cars_matching_search, $car);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            if (empty($cars_matching_search)) {
                echo "<h1>Increase your standards!</h1>";
            } else {
                foreach ($cars_matching_search as $car) {
                    $matching_model = $car->getModel();
                    $matching_price = $car->getPrice();
                    $matching_miles = $car->getMiles();
                    $matching_image = $car->getImage();
                    echo "<li> $matching_model </li>";
                    echo "<ul>";
                        echo "<li> $$matching_price </li>";
                        echo "<li> Miles: $matching_miles </li>";
                        echo "Pic: <img src=$matching_image>";
                    echo "</ul>";
                }
            }
        ?>
    </ul>
</body>
</html>
