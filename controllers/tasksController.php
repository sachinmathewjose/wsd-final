<?php

class tasksController extends http\controller
{


    //for showing all the to-do items in one page
    public static function all()
    {
        $records = todos::findAll();
        self::getTemplate('all_tasks', $records);
    }

    //this is a function to create new tasks
    public static function create()
    {
        $task = new todo();
        $edit = 0;
        if(isset($_POST['id'])) {
            $edit = 1;
            $task->id = $_POST['id'];
        }
        $task->message = $_POST['message'];
        if(!$edit) {
            $task->createddate = date("Y-m-d\TH:i");
        } else {
            $task->createddate = $_POST['startdate'];
        }
        $task->duedate = $_POST['enddate'];
        $task->ownerid = $_SESSION['userID'];
        if (isset($_POST['isdone'])) {
            $task->isdone = 1;
        }
        else {
            $task->isdone = 0;
        }
        $retID = $task->save();
        if (isset($retID)) {
            header("Location: index.php?page=accounts&action=displaytasks");
        }
        else{
            echo 'data not saved';
        }
    }

    //this is the function to view edit record form
    public static function edit()
    {
        $id =$_REQUEST['id'];
        header("Location:index.php?page=accounts&action=displaytasks&id=$id");
    }

    //One form is the to-do and the other is just for the delete button
    public static function delete()
    {
        $record = todos::findOne($_REQUEST['id']);
        if ($record->ownerid == $_SESSION['userID']) {
            $record->delete();
        }
        header("Location:index.php?page=accounts&action=displaytasks");
    }
}