<?php
ini_set("display_errors" , 1);
use Mvc\core\app\Application;
use Mvc\core\controllers\accessController;
use Mvc\core\controllers\homecontroller;
use Mvc\core\controllers\registerController;
use Mvc\core\controllers\loginController;
use Mvc\core\controllers\logoutController;
use Mvc\core\controllers\contactController;

require_once "config/config.php";
require_once "vendor/autoload.php";
require_once "config/helper.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = [
    "db" => 
        [
            "dsn"      => $_ENV['DB_DSN'] , 
            "username" => $_ENV['DB_USERNAME'] ,
            "password" => $_ENV['DB_PASSWORD']
        ]
    ];
$app = new Application($config['db']);
$app->router->get("/",[ homecontroller::class , "home"]);
$app->router->get("/home",[ homecontroller::class , "home"]);
$app->router->get("/register",[ registerController::class , "register"]);
$app->router->post("/register",[ registerController::class , "register"]);
$app->router->get("/login",[ loginController::class , "login"]);
$app->router->get("/logout",[ logoutController::class , "logout"]);
$app->router->post("/login",[ loginController::class , "login"]);
$app->router->get("/contact",[ contactController::class , "contact"]);
$app->router->post("/contact",[ contactController::class , "contact"]);
$app->router->get("/profile","profile");
$app->router->get("/notfound","notfound");

$app->run();
