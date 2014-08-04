<?php

/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 12:35
 */
abstract class Route
{
    static function start()
    {

        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
        $controller_name = DEFAULT_CONTROLLER;
        $action_name = DEFAULT_ACTION;

        // debugging
        var_dump($_GET);
        echo "<br>";
        // print_r($_GET);
        //$routes = explode('/', $_SERVER['REQUEST_URI']);

        if (isset($_GET['q'])) $routes = explode('/', $_GET['q']);


                    //  default settings

        //  get controller name
        if (!empty($routes[0])) {
            $controller_name = $routes[0];
        }

        //  get action name
        if (!empty($routes[1])) {
            $action_name = $routes[1];
        }

        // add prefix
        $model_name = 'model_' . $controller_name;
        $controller_name = 'controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        // include model class file
        $model_file = strtolower($model_name) . '.php';
        $model_path = "models/" . $model_file;

        if (file_exists($model_path)) {
            require_once "models/" . $model_file;
        }

        // add control class file
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "controllers/" . $controller_file;

        if (file_exists($controller_path)) {
            require_once "controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
        }

        // create controller with action
        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            // action start
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }

    }

    // 404
    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}

?>
