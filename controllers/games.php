<?php

require "./config.php";
$db = new Database($config);

$games = $db->query("select * from games")->fetchAll();

require "view/games.view.php";
