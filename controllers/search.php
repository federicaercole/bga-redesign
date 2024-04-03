<?php

$query = "SELECT DISTINCT * FROM games " . $expression;
$games = $db->query($query, $params)->fetchAll();

$items = array();
foreach ($games as $game) {
    $items[] = $game['title'];
}

header('Content-Type: application/json;  charset=UTF-8');

echo json_encode($items);
