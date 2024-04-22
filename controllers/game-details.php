<?php

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$slug = basename($url);

$db = new Database();
$game = $db->query("SELECT * FROM games WHERE slug = ?", [$slug])->fetch();
$mechanisms = $db->query("SELECT name, id FROM games_mechanisms JOIN mechanisms ON games_mechanisms.mechanism = mechanisms.id WHERE game = ?", [$game["id"]])->fetchAll();
$themes = $db->query("SELECT name, id FROM games_themes JOIN themes ON games_themes.theme = themes.id WHERE game = ?", [$game["id"]])->fetchAll();


function nl2p($string)
{
    $paragraphs = '';

    foreach (explode(PHP_EOL, $string) as $line) {
        if (trim($line)) {
            $paragraphs .= '<p>' . $line . '</p>';
        }
    }

    return $paragraphs;
}

require "view/game-details.view.php";
