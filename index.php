<?php
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//Autoloader class to load all the different directories
include_once "autoload.php";

//Load database credentials
include_once "database.php";

//We need to start the session in every part of the program
session_start();

//this starts the program as a static.  Start tracing the program from here following the classes and methods being called
$response = http\processRequest::createResponse();



//to get credit for using this as MVC you must rewrite what I give and improve it.
//  A good way to improve it is namespaces and making the scope of properties and functions to be correctly private, public, or protected
//there are notes throughout the code on improvements.  YOu can also correctly apply abstract and final
//you can also look for lines that can be removed by just doing it in the return
//it shouldn't be too hard to namespace and autoload
//namespaces are really needed because your collection and controller classes for todos and accounts are called the same thing.

