<?php
class App
{
    protected $controller = "Home";
    protected $action = "DefaultPage";
    protected $params = [];
    protected $route;
    function __construct()
    {
        $this->route = new route();
        $arr = $this->UrlProcess();
        // handle Controller
        if (isset($arr[0])) {
            if (file_exists("app/Controllers/" . $arr[0] . ".php")) {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once "app/Controllers/" . $this->controller . ".php";
        // $this->controller = new $this->controller;

        // handle Action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        // Params
        $this->params = $arr ? array_values($arr) : [];

        call_user_func_array([new $this->controller, $this->action], $this->params);
    }

    function UrlProcess()
    {
        if (isset($_GET["url"])) {
            $path = $_GET["url"];
            $url =  $this->route->handleRoute($path);
            return explode("/", filter_var(trim($url)));
        }
    }
}