<?php

use Windwalker\Edge\Edge;
use Windwalker\Edge\Loader\EdgeFileLoader;
use Windwalker\Edge\Loader\EdgeStringLoader;
use Windwalker\Edge\Extension\EdgeExtensionInterface;

class Controller
{
    public function __construct()
    {

    }

    public function view($view, $data = [])
    {
        $path = array('app/views');
        $edge = new Edge(new EdgeFileLoader($path));
        echo $edge->render($view, $data);
    }
}