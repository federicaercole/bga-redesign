<?php

require "./config.php";
$db = new Database($config);


function checkChoice($inputName, $value)
{
    $selectedCheckboxes = $_GET[$inputName] ?? '';
    if (!empty($selectedCheckboxes) && in_array($value, $selectedCheckboxes)) {
        echo "checked";
    }
}

$games = $db->query("select * from games")->fetchAll();
$mechanisms = $db->query("select * from mechanisms")->fetchAll();
$themes = $db->query("select * from themes")->fetchAll();

require "view/games.view.php";
