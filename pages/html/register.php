<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TO-DO</title>
    <link rel="stylesheet" href="pages/css/register.css">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js">
    </script>
</head>

<body>
<div class="container">
    <form class="well form-horizontal" action="index.php?page=accounts&action=register" method="post"  id="contact_form">
        <fieldset>
            <legend><center><h2><b>Registration Form</b></h2></center></legend><br>
            <!-- email-->
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- fname-->
            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="fname" placeholder="First Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- lname-->
            <div class="form-group">
                <label class="col-md-4 control-label" >Last Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="lname" placeholder="Last Name" class="form-control"  type="text">
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
                            <option>Male</option>
                            <option>Female</option>
                            <option >Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- birthday-->
            <div class="form-group">
                <label class="col-md-4 control-label">Date of Birth</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="birthday"  class="form-control"
                                type="date" max="<?php echo date("Y-m-d")?>">
                    </div>
                </div>
            </div>
            <!-- password-->
            <div class="form-group">
                <label class="col-md-4 control-label" >Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="password" placeholder="Password" class="form-control"  type="password">
                    </div>
                </div>
            </div>
            <!-- re type password-->
            <div class="form-group">
                <label class="col-md-4 control-label" >Confirm Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="confirm_password" placeholder="Confirm Password"
                               class="form-control"  type="password">
                    </div>
                </div>
            </div>
            <!-- Phone-->
            <div class="form-group">
                <label class="col-md-4 control-label">Contact No.</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="phone" placeholder="(639)" class="form-control" type="text">
                    </div>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4" ><br>
                    <button style="margin:auto;display:block;" type="submit" class="btn btn-warning" >SUBMIT <span
                                class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4" ><br>
                    <p style="text-align:center">Already have an account? <a href="index.php">Login</a></p>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script src="pages/script/register.js"></script>
</body>
</html>
