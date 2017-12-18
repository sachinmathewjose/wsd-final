<?php

//this is the controller for the index page.

class homepageController extends http\controller
{
    public static function show()
    {
        if(key_exists('userID',$_SESSION)) {
            header("Location: index.php?page=accounts&action=displaytasks");
        } else {
            $templateData['site_name'] = 'mysite';
            self::getTemplate('homepage', $templateData);
        }
    }

    //this is to login, here is where you find the account and allow login or deny.
    public static function login()
    {
        $user = accounts::findUserbyEmail($_REQUEST['email']);
        if ($user == FALSE) {
            $_SESSION["error"] = 'User not found.';
            header("Location: index.php");
        } else {
            if($user->checkPassword($_POST['password']) == TRUE) {
                $_SESSION["userID"] = $user->id;
                header("Location: index.php?page=accounts&action=displaytasks");
            } else {
                $_SESSION["error"] = 'email or password doesn\'t match';
                header("Location: index.php");
            }
        }
    }

    //this is to register an account i.e. insert a new account
    public static function register()
    {
        self::getTemplate('register');
    }

}
