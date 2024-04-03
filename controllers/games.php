<?php

function checkChoice($inputName, $value)
{
    $selectedChoices = $_GET[$inputName] ?? '';
    if (is_array($selectedChoices)) {
        if (!empty($selectedChoices) && in_array($value, $selectedChoices)) {
            echo "checked";
            return;
        }
    } else {
        if ($selectedChoices == $value) {
            echo "selected";
        }
    }
}

$query = "SELECT DISTINCT * FROM games " . $expression;

$games = $db->query($query, $params)->fetchAll();
$mechanisms = $db->query("SELECT * FROM mechanisms")->fetchAll();
$themes = $db->query("SELECT * FROM themes")->fetchAll();

require "view/games.view.php";
