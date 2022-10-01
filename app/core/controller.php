<?php
class controller
{
    public  function Model($model)
    {
        require_once("app/Models/" . $model . ".php");
        return new $model;
    }
    public function view($view, $data = [])
    {
        require_once("app/Views/" . $view . ".php");
    }
}
