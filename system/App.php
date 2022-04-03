<?php


class App
{
    protected $controller;
    protected $method;
    protected $params = [];

    public function __construct()
    {
        $this->controller = "home";
        $this->method = "index";
        if (isset($_GET["url"]))
        {
            $url = $this->parseUrl();
        }
        else
        {
            $url[0] = $this->controller;
            $url[1] = $this->method;
        }

        if (file_exists("app/controllers/" . $url[0] . ".php"))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . ".php";
        $this->controller = new $this->controller;
        if (isset($url[1]))
        {
            if (method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
    }
}