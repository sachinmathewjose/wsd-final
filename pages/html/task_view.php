<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="pages/css/task_view.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="pages/script/task_view.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <![endif]-->
</head>

<body>
<h1><a href="index.php?page=accounts&action=logout">LOG OUT</a></h1>
<?php
//this is how you print something
if (isset($data['account'])) {
    print utility\htmlTable::generateTableFromOneRecord($data['account']);
}
$edit = NULL;
if (isset($data['edit'])) {
        if (isset($data['table'])) {
            foreach ($data['table'] as $raw) {
                if ($raw->id == $data['edit'])
                {
                    $edit = $raw;
                }
        }
    }
}
?>
<div class="container" id="main">
    <h1>My TODO list</h1>
    <form class="form-inline" role="form" action="index.php?page=tasks&action=create" id="main_input_box" method="post">
        <div class="form-group">
            <label for="message">Message:</label>
            <input type="text" class="form-control" id="custom_textbox" name="message"
                <?php if($edit) {echo "value=$edit->message";}
                    else {echo ' placeholder="Task\'s message here"';}?> >
        </div>
        <div class="form-group">
            <label for="startdate">start date:</label>
            <input  name="startdate"  class="form-control"  type="datetime-local"
                    value='<?php if($edit) echo date("Y-m-d\TH:i", strtotime($edit->createddate)); ?>' >
        </div>
        <div class="form-group">
            <label for="enddate">end date:</label>
            <input  name="enddate"  class="form-control"  type="datetime-local"
                    value='<?php if($edit) echo date("Y-m-d\TH:i", strtotime($edit->duedate)); ?>'>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="isdone" <?php if($edit){if($edit->isdone){echo "checked";} }?> >is done</label>
        </div>
        <?php if($edit) { ?>  <input  name="id" type=hidden  value='<?php echo $edit->id; ?>' >   <?php } ?>
        <button type="submit" class="btn btn-primary add_button">Add ToDo</button>
    </form>
<?php
if (isset($data['table'])) {
    foreach ($data['table'] as $raw){
        ?>
        <li class='list-group-item'>
            <div class='text_holder'>
                <input name="message" type="text" value='<?php echo $raw->message; ?>' readonly>
                <input name="startdate" type="datetime-local" value='<?php echo date("Y-m-d\TH:i", strtotime($raw->createddate)); ?>' readonly>
                <input name="enddate" type="datetime-local" value='<?php echo date("Y-m-d\TH:i", strtotime($raw->duedate)); ?>' readonly>
                <div class='btn-group pull-right'>
                    <button class='delete btn btn-warning' id="<?php echo $raw->id; ?>" onclick="deletetask(this.id)">Delete</button>
                    <button class='edit btn btn-success' id="<?php echo $raw->id; ?>" onclick="edittask(this.id)">Edit</button>
                </div>
                <div class='checkbox'><label><input type='checkbox' name="isdone" <?php if($raw->isdone)echo 'checked';  ?> disabled="disabled">is done</label></div>
            </div>
        </li>
        <?php
    }
}
?>
</div>


</body>
</html>