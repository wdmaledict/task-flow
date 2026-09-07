<?php

use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $statusCode = 403)
{
    if (!$condition) {
        abort($statusCode);
    }
}

function base_path($path = '')
{
    return __DIR__ . '/../' . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}
