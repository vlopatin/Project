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


        $controller_name = 'login';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
//print_r($routes);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
              $controller_name = $routes[1];
         //   print_r($routes[1]);
        }

        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // префиксы

        $model_name = 'model_' . $controller_name;
        $controller_name = 'controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        // цепляем файл с классом модели

        $model_file = strtolower($model_name) . '.php';
        $model_path = "models/" . $model_file;

        if (file_exists($model_path))
        {
            require_once "models/" . $model_file;
          #  echo "111";
        }

        // цепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "controllers/" . $controller_file;

        if (file_exists($controller_path))
        {
            require_once "controllers/" . $controller_file;
        } else
        {
        // Route::ErrorPage404();
        }

        // создаем контроллер

        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем метод (действие) контроллера
            $controller->$action();
        } else
        {
           //Route::ErrorPage404();
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