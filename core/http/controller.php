<?php

namespace http;
//this is the controller class that you use to connect models with views and business logic
class controller
{
    //Connect phpstorm to controller
    static public function getTemplate($template, $data = NULL)
    {
        $template = 'pages/html/' . $template . '.php';
        //The $data array can be used inside the page to pass value to page
        include $template;
    }
}