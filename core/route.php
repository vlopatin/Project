<?php
/**
 * Created by PhpStorm.
 * User: vlopatin
 * Date: 29.07.14
 * Time: 12:35
 */

class Route
{
    static function start()
    {
	//  default settings
	$controller_name = 'login';
        $action_name = 'index';

	$routes = explode('/', $_SERVER['REQUEST_URI']);

        //  get controller name
        if ( !empty($routes[1]) )
        {
              $controller_name = $routes[1];
         }

        // get action name
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // add prefics
        $model_name = 'model_' . $controller_name;
        $controller_name = 'controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        // add model class file
        $model_file = strtolower($model_name) . '.php';
        $model_path = "models/" . $model_file;

        if (file_exists($model_path))
        {
            require_once "models/" . $model_file;
         }

        // add controll class file
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "controllers/" . $controller_file;

        if (file_exists($controller_path))
        {
            require_once "controllers/" . $controller_file;
        } else
        {
        	Route::ErrorPage404();
        }

        // create controller with action
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
        // action start
            $controller->$action();
        } else
        {
        	Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
     }
}
?>
