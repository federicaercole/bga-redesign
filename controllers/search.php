<?php

$db = new Database();
[$expression, $params] = getFilterExpression();

$query = "SELECT DISTINCT * FROM games " . $expression . " LIMIT 10";
$games = $db->query($query, $params)->fetchAll();

$items = array();
foreach ($games as $game) {
    $items[] = ["title" => $game['title'], "slug" => $game['slug']];
}

header('Content-Type: application/json;  charset=UTF-8');

echo json_encode($items);
