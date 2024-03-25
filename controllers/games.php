<?php

require "./config.php";
$db = new Database($config);

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

function printPlaceholders($array)
{
    return str_repeat('?,', count($array) - 1) . '?';
}

function getFilterExpression()
{
    $joinClauses = [];
    $whereClauses = [];
    $params = [];
    $expression = "";

    if (isset($_GET["players"]) && $_GET["players"] != "") {
        array_push($params, $_GET["players"], $_GET["players"]);
        array_push($whereClauses, "min_players <= ? AND max_players >= ?");
    }

    if (isset($_GET["time"]) && $_GET["time"] != "") {
        array_push($params, $_GET["time"]);
        array_push($whereClauses, "time <= ?");
    }

    if (isset($_GET["complexity"])) {
        array_push($params, ...$_GET["complexity"]);
        array_push($whereClauses, "complexity IN (" . printPlaceholders($_GET["complexity"]) . ")");
    }

    if (isset($_GET["mechanism"])) {
        array_push($params, ...$_GET["mechanism"]);
        array_push($joinClauses, "JOIN games_mechanisms ON games.id = games_mechanisms.game");
        array_push($whereClauses, "games_mechanisms.mechanism IN (" . printPlaceholders($_GET["mechanism"]) . ")");
    }

    if (isset($_GET["theme"])) {
        array_push($params, ...$_GET["theme"]);
        array_push($joinClauses, "JOIN games_themes ON games.id = games_themes.game");
        array_push($whereClauses, "games_themes.theme IN (" . printPlaceholders($_GET["theme"]) . ")");
    }

    $expression .= implode(" ", $joinClauses);

    if ($whereClauses) {
        $expression .= " WHERE " . implode(" AND ", $whereClauses);
    }

    if (!isset($_GET["sort"])) {
        $expression .= " ORDER BY date_added DESC";
    } else {
        switch ($_GET["sort"]) {
            case "ascending":
                $expression .= " ORDER BY title ASC";
                break;
            case "descending":
                $expression .= " ORDER BY title DESC";
                break;
            case "popular":
                $expression .= " ORDER BY number_of_games DESC";
                break;
            default:
                $expression .= " ORDER BY date_added DESC";
        }
    }

    return ['expression' => $expression, 'params' => $params];
}

['expression' => $expression, 'params' => $params] = getFilterExpression();
$query = "SELECT DISTINCT title, min_players, max_players, time, complexity, premium, cover_image, date_added, number_of_games FROM games " . $expression;

$games = $db->query($query, $params)->fetchAll();
$mechanisms = $db->query("SELECT * FROM mechanisms")->fetchAll();
$themes = $db->query("SELECT * FROM themes")->fetchAll();

require "view/games.view.php";
