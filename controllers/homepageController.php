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

    public static function create()
    {
//I just put a $_POST here but this is where you would put the code to add a record
        print_r($_POST);
    }
    //this is to login, here is where you find the account and allow login or deny.
    public static function login()
    {
        $user = accounts::findUserbyEmail($_REQUEST['email']);
        if ($user == FALSE) {
            echo 'user not found';
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

}
