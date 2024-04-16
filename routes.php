<?php

$router->get("/", 'controllers/index.php');
$router->get("/games/", 'controllers/games.php');

$db = new Database();
$games = $db->query("SELECT DISTINCT slug FROM games")->fetchAll();
foreach ($games as $game) {
    $router->get("/games/{$game['slug']}/", 'controllers/game-details.php');
}

$router->get("/search/", 'controllers/search.php');
