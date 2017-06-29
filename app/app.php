<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    session_start();

    if(empty($_SESSION['list_of_cars'])) {
        $_SESSION['list_of_cars'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('car.html.twig', array('cars' => Car::getAll()));
    });

    $app->post("/create", function() use ($app) {
        $car = new Car($_POST['make-model'], $_POST['price'], $_POST['mileage'], $_POST['image']);
        $car->save();
        return $app['twig']->render('create_car.html.twig', array('newcar' => $car));
    });

    return $app;
?>
