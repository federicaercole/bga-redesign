<?php

function getHead()
{
    return require "view/partials/head.php";
}

function getNavbar()
{
    return require "view/partials/navbar.php";
}

function getFooter()
{
    return require "view/partials/footer.php";
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}
