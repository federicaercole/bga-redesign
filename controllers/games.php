<?php

require "./config.php";
$db = new Database($config);

$games = $db->query("select * from games")->fetchAll();
$mechanisms = $db->query("select * from mechanisms")->fetchAll();
$themes = $db->query("select * from themes")->fetchAll();

require "view/games.view.php";
