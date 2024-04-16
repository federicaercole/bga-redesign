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

function printNumberofSelectedValues($inputName)
{
    if (isset($_GET[$inputName])) {
        if (is_array($_GET[$inputName]) && !empty($_GET[$inputName])) {
            $count = count($_GET[$inputName]);
            return "<span><span class='visually-hidden'>Number of selected filters:</span>{$count}</span>";
        } else if ($_GET[$inputName] != "") {
            return "<span>{$_GET[$inputName]}</span>";
        }
    }
};

$db = new Database();
[$expression, $params] = getFilterExpression();

$query = "SELECT DISTINCT * FROM games " . $expression;

$games = $db->query($query, $params)->fetchAll();
$mechanisms = $db->query("SELECT * FROM mechanisms")->fetchAll();
$themes = $db->query("SELECT * FROM themes")->fetchAll();

require "view/games.view.php";
