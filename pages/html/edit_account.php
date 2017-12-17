<!DOCTYPE html>
<html lang="en">
<head>
    <title>EditAccount</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pages/css/edit_account.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>

</head>
<body>
<?php
if (isset($data)) {
    $account = $data;
}
?>
<div class="well">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
        <li><a href="#profile" data-toggle="tab">Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active in" id="home">
            <form class="well form-horizontal" action="index.php?page=accounts&action=save" method="post"  id="contact_form">
                <fieldset>
                    <!-- Form Name -->
                    <legend><center><h2><b>Registration Form</b></h2></center></legend><br>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" value="<?php echo $account->email;?>"
                                       class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                        <label class="col-md-4 control-label">First Name</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="fname" value="<?php echo $account->fname;?>"
                                        class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                        <label class="col-md-4 control-label" >Last Name</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="lname" value="<?php echo $account->lname;?>"
                                       class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Gender</label>
                        <div class="col-md-4 selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="gender" class="form-control selectpicker">
                                    <option value="">Select Gender</option>
                                    <option <?php if($account->gender == 'male')echo 'selected';?>>male</option>
                                    <option <?php if($account->gender == 'female')echo 'selected';?>>female</option>
                                    <option <?php if($account->gender == 'other')echo 'selected';?>>other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                        <label class="col-md-4 control-label">Date of Birth</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="birthday" value="<?php echo $account->birthday;?>"  class="form-control"  type="date" max="<?php echo date("Y-m-d")?>">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Contact No.</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="phone" value="<?php echo $account->phone;?>" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-2" ><br>
                            <button style="margin:auto;display:block;" type="submit" class="btn btn-warning" >SUBMIT <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                        <div class="col-md-2" ><br>
                            <button style="margin:auto;display:block;" type="button" onclick="canceledit()" class="btn btn-warning" >CANCEL <span class="glyphicon glyphicon-remove"></span></button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="profile">
            <form class="well form-horizontal" action="index.php?page=accounts&action=editpassword" method="post"  id="pswd_form">
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Old Password</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="old_password" placeholder="enter old Password" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Password</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="password" placeholder="New Password" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Confirm Password</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-2" ><br>
                            <button style="margin:auto;display:block;" type="submit" class="btn btn-warning" >SUBMIT <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                        <div class="col-md-2" ><br>
                            <button style="margin:auto;display:block;" type="button" onclick="canceledit()" class="btn btn-warning" >CANCEL <span class="glyphicon glyphicon-remove"></span></button>
                        </div>
                    </div>
                </fieldset>
        </div>
    </div>
    <script src="pages/script/edit_accounts.js"></script>
</body>
</html>
