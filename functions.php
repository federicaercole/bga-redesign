<?php

function getHead()
{
    require "./config.php";
    require "view/partials/head.php";
}

function getNavbar()
{
    return require "view/partials/navbar.php";
}

function getFooter()
{
    require "./config.php";
    require "view/partials/footer.php";
}

function getGameArticle($game)
{
    require "./config.php";
    return require "view/partials/game-article.php";
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}
