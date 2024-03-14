<?php

require "./config.php";
$db = new Database($config);

$games = $db->query("select * from games")->fetchAll();
$categories = $db->query("select * from categories")->fetchAll();

require "view/games.view.php";
