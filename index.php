<?php 

require "./src/system/Router.php";

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router = new Router();

$router->add("/baby_name/", function () {
    include "pages/main.php";
});

$router->add("/baby_name/male", function () {
    include "pages/male.php";
});

$router->add("/baby_name/female", function () {
    include "pages/female.php";
});

$router->add("/baby_name/name/{id}", function ($id) {
    echo "This is the page for name $id";
});

$router->dispatch($path);