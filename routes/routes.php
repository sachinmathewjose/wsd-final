<?php

class routes
{
    public static function getRoute($request_method,$page,$action)
    {
        //Show homepage
        $routes[] = self::create('GET','show','homepage','homepageController','show');
        //Homepage post for login
        $routes[] = self::create('POST','login','homepage','homepageController','login');
        //GET METHOD index.php?page=tasks&action=show
        //$routes[] = self::create('GET','show','tasks','tasksController','show');
        //To show all tasks page
        $routes[] = self::create('GET','all','tasks','tasksController','all');
        //To show all accounts
        $routes[] = self::create('GET','all','accounts','accountsController','all');
        //GET METHOD index.php?page=accounts&action=show
        $routes[] = self::create('GET','show','accounts','accountsController','show');
        //YOU WILL NEED TO ADD MORE ROUTES
        $routes[] = self::create('GET','delete','tasks','tasksController','delete');
        $routes[] = self::create('GET','edit','tasks','tasksController','edit');
        $routes[] = self::create('GET','delete','accounts','accountsController','delete');
        $routes[] = self::create('GET','edit','accounts','accountsController','edit');
        $routes[] = self::create('POST','save','accounts','accountsController','save');
        $routes[] = self::create('POST','editpassword','accounts','accountsController','editpassword');
        //this is the route for the reg form
        $routes[] = self::create('GET','register','accounts','accountsController','register');
        //this handles the reg post to create the user
        $routes[] = self::create('POST','register','accounts','accountsController','store');
        $routes[] = self::create('GET','displaytasks','accounts','accountsController','displaytasks');
        $routes[] = self::create('GET','logout','accounts','accountsController','logout');
        $routes[] = self::create('POST','create','tasks','tasksController','create');
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
        //added a return statement:!!!
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