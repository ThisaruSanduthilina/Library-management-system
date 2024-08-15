<?php
include "connection.php"; 
session_start();

if (!isset($_SESSION['login_user'])) {
    // Redirect to the login page if not logged in
    header("Location: student_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="index-background">
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
                        <li><a href="Books.php">Books</a></li>
                        <li><a href="student_login.php">Student Login</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="pbg">
            
            <div class="wrapper">
                <?php
                    if(isset($_POST['submit1']))
                    {
                        ?>
                            <script type="text/javascript">
                                window.location="edit.php"
                            </script>
                        <?php
                    }
                    
                    $q = mysqli_query($db, "SELECT * FROM student WHERE username='$_SESSION[login_user]';");
                    $row = mysqli_fetch_assoc($q);
                ?>
                <h2 style="text-align: center;">My Profile</h2>
                <div style="text-align: center;">
                    <img class="img-circle profile-img" height=110 width=120 src="images/logo.jepg">
                </div>
                <div style="text-align: center;"> 
                    <b>Welcome</b>
                    <h4><?php echo $_SESSION['login_user']; ?></h4>
                </div>
                <b>
                    <div class="boxprof">
                <table class='table-bordered'>
                    <tr>
                        <td><b>First Name:</b></td>
                        <td><?php echo $row['fname']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Last Name:</b></td>
                        <td><?php echo $row['Lname']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Username:</b></td>
                        <td><?php echo $row['username']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td><?php echo $row['password']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Contact:</b></td>
                        <td><?php echo $row['contact']; ?></td>
                    </tr>
                </table>
                </div>
                </b>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p style="color: white; text-align: center;">
                Email: Thisrusanduthilina@gmail.com <br><br>
                Mobile: +0751234567
            </p>
        </div>
    </footer>
</body>
</html>
