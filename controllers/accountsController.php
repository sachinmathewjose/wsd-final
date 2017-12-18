<?php

//each page extends controller and the index.php?page=tasks causes the controller to be called
class accountsController extends http\controller
{
    public static function all()
    {

        $records = accounts::findAll();
        self::getTemplate('all_accounts', $records);

    }

    //this is the function to save the user the new user for registration
    public static function store()
    {
        $user = accounts::findUserbyEmail($_REQUEST['email']);
        if ($user == FALSE) {
            $user = new account();
            $user->email = $_POST['email'];
            $user->fname = $_POST['fname'];
            $user->lname = $_POST['lname'];
            $user->phone = $_POST['phone'];
            $user->birthday = $_POST['birthday'];
            $user->gender = $_POST['gender'];
            $user->password = $user->setPassword($_POST['password']);
            $user->save();
            // automatically login after account creation
            if (isset($user->id)) {
                $_SESSION['userID'] = $user->id;
                header("Location: index.php?page=accounts&action=displaytasks");
            }
            else{
                echo 'data not saved';
            }

        } else {
            $_SESSION['error'] = 'account already exists. Please login';
            header("Location: index.php");
        }
    }

    public static function edit()
    {
        $record = accounts::findOne($_SESSION['userID']);
        self::getTemplate('edit_account', $record);
    }
//this is used to save the update form data
    public static function save() {
        $user = accounts::findOne($_SESSION['userID']);
        $userwithEmail = accounts::findUserbyEmail($_POST['email']);

        if ($user->email == $userwithEmail->email || $userwithEmail == FALSE) {
            $user->email = $_POST['email'];
        } else {
            $_SESSION["error"] = 'Email already existing.';
        }
        $user->fname = $_POST['fname'];
        $user->lname = $_POST['lname'];
        $user->phone = $_POST['phone'];
        $user->birthday = $_POST['birthday'];
        $user->gender = $_POST['gender'];
        $user->save();
        if(isset($_SESSION['error'])) {
            $_SESSION["error"] = 'profile updated successfully';
        } else {
            $_SESSION["error"] .= 'Email updation failed. Profile updated successfully';
        }
        header("Location: index.php");
    }

    public static function editpassword() {
        $user = accounts::findOne($_SESSION['userID']);
        if ($user == FALSE) {
            echo 'user not found';
        } else {
            if($user->checkPassword($_POST['old_password']) == TRUE) {
                $user->password = $user->setPassword($_POST['password']);
                $user->save();
                $_SESSION["error"] = 'password updated successfully';
                header("Location: index.php?page=accounts&action=displaytasks");
            } else {
                $_SESSION["error"] = 'password doesn\'t match';
                header("Location: index.php?page=accounts&action=edit");
            }
        }
    }

    public static function delete()
    {
        $record = accounts::findOne($_REQUEST['id']);
        $record->delete();
        if(isset($_SESSION["userID"])) {
            unset($_SESSION["userID"]);
        }
        header("Location: index.php");
    }

    public static function displaytasks()
    {
        $userID = NULL;
        if(key_exists('userID',$_SESSION)) {
            $userID = $_SESSION['userID'];
        } else {
            $_SESSION['error'] = 'you must login to display tasks';
            header("Location:index.php");
        }
        $data['account'] = accounts::findone($userID);
        $table = NULL;
        $table = todos::findTasksbyID($userID);
        if ($table != NULL)
            $data['table'] =$table;
        if (isset($_REQUEST['id'])) {
            $data['edit'] = $_REQUEST['id'];
        }
        self::getTemplate('task_view', $data);
    }

    public static function logout()
    {
        if(key_exists('userID',$_SESSION)) {
            unset($_SESSION['userID']);
        } else {
            echo 'not logged in';
        }
        $_SESSION['error'] = 'Successfully logged out';
        header('Location: index.php');
    }
}