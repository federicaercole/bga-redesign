<?php

require "functions.php";
require "Database.php";
require "Router.php";

$router = new Router();
require "routes.php";

$router->route();
