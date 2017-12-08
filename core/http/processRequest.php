<?php

//Using namespace here help to avoid putting namespace name in all class definition
namespace http;

class processRequest
{
    //This is the main function which call the response to a get or post request
    public static function createResponse()
    {
        $requested_route = processRequest::getRequestedRoute();
        //Get the controller name
        $controller_name = $requested_route->controller;
        //Get the method name
        $controller_method = $requested_route->method;
        //I use a static for the controller because it doesn't have any properties
        $controller_name::$controller_method();
    }

    //this function matches the request to the correct controller
    public static function getRequestedRoute()
    {
        $request_method = request::getRequestMethod();
        $page = request::getPage();
        $action = request::getAction();
        $foundRoute = NULL;
        $foundRoute = \routes::getRoute($request_method,$page,$action);

        if (is_null($foundRoute)) {
            controller::getTemplate('notfound');
            exit;
        }
        else {
            return $foundRoute;
        }
    }
}
