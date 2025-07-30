<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIS($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($view, $attributes = [])
{
    extract($attributes);

    require base_path("views/{$view}");
}

function redirect($path)
{
    header("location: {$path}");
    die();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}
