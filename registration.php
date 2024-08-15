<?php
include "connection.php";

$message = ""; // Initialize message variable
$message_type = ""; // Initialize message type

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['Lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql = "SELECT username FROM student WHERE username='$username'";
    $res = mysqli_query($db, $sql);

    if (mysqli_num_rows($res) == 0) {
        $query = "INSERT INTO student (fname, lname, username, password, email, contact) VALUES ('$fname', '$lname', '$username', '$password', '$email', '$contact')";

        if (mysqli_query($db, $query)) {
            $message = "Registration Successful";
            $message_type = "success";
        } else {
            $message = "Registration Failed";
            $message_type = "danger";
        }
    } else {
        $message = "The username already exists";
        $message_type = "warning";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .custom-message {
            max-width: 400px; /* Adjust this value as needed */
            height:50px;
            margin: 20px auto; /* Center the message box */
            padding: 10px 20px; /* Adjust padding as needed */
            font-size: 14px; /* Adjust font size as needed */
            text-align: center; /* Center align text */
        }
        .custom-message.success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .custom-message.danger {
            background-color: #f2dede;
            color: #a94442;
        }
        .custom-message.warning {
            background-color: #fcf8e3;
            color: #8a6d3b;
        }
    </style>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".custom-message").fadeOut("slow", function() {
                    $(this).remove();
                });
            }, 3000); // Adjust this value to set the duration (in milliseconds)
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
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="books.php">Books</a></li>
                        <li><a href="student_login.php">Student Login</a></li>
                        <li><a href="registration.php">Registration</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="reg_img">
            <div class="box2">
                <h2>Library Management System</h2>
                <p>Register</p>
                <form name="registration" action="" method="post">
                    <div class="login">
                        <input class="form-control" type="text" name="fname" placeholder="First name" required=""><br>
                        <input class="form-control" type="text" name="Lname" placeholder="Last name" required=""><br>
                        <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                        <input class="form-control" type="email" name="email" placeholder="Email" required=""><br>
                        <input class="form-control" type="number" name="contact" placeholder="Phone Number" required=""><br><br>
                        <input class="btn btn-gold btn-block" type="submit" name="submit" value="Sign Up"><br><br>
                    </div>
                </form>
                <?php if ($message != "") { ?>
                    <div class="custom-message <?php echo $message_type; ?>">
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <footer>
        <p style="color: white; text-align: right;">
            Email :&nbsp; Thisrusanduthilina@gmail.com <br><br>
            Mobile :&nbsp; +0751234567
        </p>
    </footer>
</body>
</html>
