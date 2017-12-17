<?php
/**
 * Created by PhpStorm.
 * User: kwilliams
 * Date: 11/27/17
 * Time: 5:32 PM
 */


//each page extends controller and the index.php?page=tasks causes the controller to be called
class tasksController extends http\controller
{
    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show
//    public static function show()
//    {
//        $record = todos::findOne($_REQUEST['id']);
//        self::getTemplate('show_task', $record);
//    }

    //to call the show function the url is index.php?page=task&action=all
    public static function all()
    {
        $records = todos::findAll();
        self::getTemplate('all_tasks', $records);
    }

    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks

    //you should check the notes on the project posted in moodle for how to use active record here

    public static function create()
    {
        $task = new todo();
        if(isset($_POST['id'])) {
            $task->id = $_POST['id'];
        }
        $task->message = $_POST['message'];
        $task->createddate = $_POST['startdate'];
        $task->duedate = $_POST['enddate'];
        $task->ownerid = $_SESSION['userID'];
        if (isset($_POST['isdone'])) {
            $task->isdone = 1;
        }
        else {
            $task->isdone = 0;
        }
        $task->save();
        if (isset($task->id)) {
            header("Location: index.php?page=accounts&action=displaytasks");
        }
        else{
            echo 'data not saved';
        }
    }

//    //this is the function to view edit record form
//    public static function edit()
//    {
//        $id =$_REQUEST['id'];
//        header("Location:index.php?page=accounts&action=displaytasks&id=$id");
//    }
    //this would be for the post for sending the task edit form
    public static function store()
    {

        $record = todos::findOne($_REQUEST['id']);
        $record->body = $_REQUEST['body'];
        $record->save();
        print_r($_POST);

    }

    public static function save() {
        //session_start();
        $task = new todo();

        $task->body = $_POST['body'];
        $task->ownerid = $_SESSION['userID'];
        $task->save();

    }

    //this is the delete function.  You actually return the edit form and then there should be 2 forms on that.
    //One form is the todo and the other is just for the delete button
    public static function delete()
    {
        $record = todos::findOne($_REQUEST['id']);
        if ($record->ownerid == $_SESSION['userID']) {
            $record->delete();
        }
        header("Location:index.php?page=accounts&action=displaytasks");
    }

}