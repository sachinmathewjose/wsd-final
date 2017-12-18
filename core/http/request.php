<?php
namespace http;

class request
{
    static public function getRequestMethod()
    {
        if(!empty($_SERVER['REQUEST_METHOD'])) {
            $request_method = $_SERVER['REQUEST_METHOD'];
        }
        return $request_method;
    }

    static public function getPage()
    {
    //Default page is homepage
        $page = 'homepage';
        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
        }
        return $page;
    }

    static public function getAction()
    {
        //Set action for homepage(Default)
        if (self::getRequestMethod() == 'POST') {
            $action = 'create';
        } else {
            $action = 'show';
        }

        if (!empty($_GET['action'])) {
            $action = $_GET['action'];
        }
        return $action;
    }
}