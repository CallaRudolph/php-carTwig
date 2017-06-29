<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $image;


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
            $this->price = $new_price;
        }

        function getPrice()
        {
            return $this->price;
        }

        function setMiles($new_miles)
        {
            $this->miles = $new_miles;
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

        function save()
        {
            array_push($_SESSION['list_of_cars'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_cars'];
        }

        static function deleteAll()
        {
            return $_SESSION['list_of_cars'] = array();
        }
    }

    ?>
