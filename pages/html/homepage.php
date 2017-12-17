<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TO-DO</title>
    <link rel="stylesheet" href="pages/css/homepage.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
<?php
  if(isset($_SESSION['error'])) {
      echo '<div class="alert" style="text-align:center">';
      echo '<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';
      echo $_SESSION['error'];
      echo '</div>';
      unset($_SESSION['error']);
  }
?>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Log in with your email account</h1>
                    <form role="form" action="index.php?page=homepage&action=login"
                          method="POST" id="login-form">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email"
                                   class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="key"
                                   class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                               value="Log in">
                    </form>
                    <p class="register">New user?<a href="index.php?page=accounts&action=register"
                                                    data-toggle="modal" data-target=".forget-modal">Register</></p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p><a href="index.php?page=accounts&action=all">Show All Accounts</a></p>
                <p><a href="index.php?page=tasks&action=all">Show All Tasks</a></p>
            </div>
        </div>
    </div>
</footer>
<h1></h1>
<h1></h1>
<script src="pages/script/homepage.js"></script>
</body>
</html>