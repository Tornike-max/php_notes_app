<?php


function view($path)
{
    if (!$path) {
        return;
    }

    return require $path;
}

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit();
}

function getPath()
{
    return parse_url($_SERVER['REQUEST_URI']);
}

function getMethod()
{
    return $_SERVER['REQUEST_METHOD'];
}
