<?php

class routes
{
    public static function getRoute($request_method,$page,$action)
    {
        //Show homepage
        $routes[] = self::create('GET','show','homepage','homepageController','show');
        //Homepage post for login
        $routes[] = self::create('POST','login','homepage','homepageController','login');
        //this is the route for the reg form
        $routes[] = self::create('GET','register','homepage','homepageController','register');
        //To show all accounts
        $routes[] = self::create('GET','all','accounts','accountsController','all');
        //this handles the post request from registration to create the user
        $routes[] = self::create('POST','register','accounts','accountsController','store');
        //THis display the homepage for a user, that contains the user details and todo list
        $routes[] = self::create('GET','displaytasks','accounts','accountsController','displaytasks');
        //For logging out the user
        $routes[] = self::create('GET','logout','accounts','accountsController','logout');
        //to go to account edit page
        $routes[] = self::create('GET','edit','accounts','accountsController','edit');
        //Post request to save updated account data
        $routes[] = self::create('POST','save','accounts','accountsController','save');
        //Post request for edit password
        $routes[] = self::create('POST','editpassword','accounts','accountsController','editpassword');
        //Delete an account
        $routes[] = self::create('GET','delete','accounts','accountsController','delete');
        //Delete a task
        $routes[] = self::create('GET','delete','tasks','tasksController','delete');
        //Edit an task
        $routes[] = self::create('GET','edit','tasks','tasksController','edit');
        //Post request to create or edit a task
        $routes[] = self::create('POST','create','tasks','tasksController','create');
        //To show all tasks page
        $routes[] = self::create('GET','all','tasks','tasksController','all');

        $foundRoute = NULL;
        foreach ($routes as $route) {
            if ($route->page == $page && $route->http_method == $request_method && $route->action == $action) {
                $foundRoute = $route;
                break;
            }
        }
        return $foundRoute;
    }

    public static function create($http_method,$action,$page,$controller,$method) {
        //I don't know the use of this function
        $route = new route();
        $route->http_method = $http_method;
        $route->action = $action;
        $route->page = $page;
        $route->controller = $controller;
        $route->method = $method;
        return $route;
    }
}

//this is the route prototype object  you would make a factory to return this

class route
{
    public $page;
    public $http_method;
    public $action;
    public $method;
    public $controller;
}