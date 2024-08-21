<?php


function view($path, $attributes = [])
{
    extract($attributes);
    require $path;
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

function abort($responseCode = 404)
{
    http_response_code($responseCode);
    require "../views/$responseCode.php";
    die();
}

function hasData($data)
{
    if (!$data) {
        abort(404);
    }
    return true;
}

function getData()
{
    $data = $_POST;
    return $data;
}
