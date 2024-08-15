<?php
include "connection.php";
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = mysqli_query($db, "SELECT * FROM student WHERE username='$username' AND password='$password'");
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        ?>
        <script type="text/javascript">
            window.location = "profile.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("The Username and Password doesn't match! Please try again.");
            window.location = "student_login.php"; // Redirect back to login page
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        nav {
            margin-bottom: 1px;
        }
        .custom-message {
            max-width: 400px;
            width: 80%;
            height:50px;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            position: fixed;
            top: 29%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
        .custom-message.success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .custom-message.danger {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".custom-message").fadeOut("slow", function() {
                    $(this).remove();
                });
            }, 3000); 
        });
    </script>
</head>
<body class="login-background">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <img src="images/logo.jpeg" alt="Library Logo" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="logo-text">
                        <h1>Online Library Management System</h1>
                        <p>Your gateway to a world of books</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    
                    <ul class="navbar1">
                        <br>
                        <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in">Login</span></a>
                        <a href="index.php"><span class="glyphicon glyphicon-log-in">Log Out</span></a>
                        <a href="registration.php"><span class="glyphicon glyphicon-log-in">Admin Login</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="login_img">
            <div class="box1">
                <h2>Library Management System</h2>
                <h3>Login</h3>
                <form name="login" action="" method="post">
                    <div class="login">
                        <input type="text" name="username" placeholder="Username" class="form-control" required><br><br>
                        <input type="password" name="password" placeholder="Password" class="form-control" required><br><br>
                        <input class="btn btn-gold btn-block" type="submit" name="submit" value="Login"><br><br><br><br><br><br>
                   
                        <p><a href="registration.php">Forgot Password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You are new to this website? <a style="color: white;" href="registration.php">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <p style="color: white;text-align: right;">
            Email :&nbsp; Thisrusanduthilina@gmail.com <br><br>
            Mobile :&nbsp; +0751234567
        </p>
    </footer>
</body>
</html>
 