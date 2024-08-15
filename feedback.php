<?php
include "connection.php";
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

    <style type="text/css">
        
        .wrapper {
            padding: 10px;
            margin: -20px auto;
            width: 900px;
            height: 600px;
            background-color: black;
            opacity: .8;
            color: white;
        }
        .form-control {
            height: 70px;
            width: 60%;
        }
        .scroll {
            width: 100%;
            height: 300px;
            overflow: auto;
        }
        .center-button {
        display: block;
        margin: 0 auto;
        width: 100px;
        height: 35px;
        background-color: gold;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .center-button:hover {
        background-color: darkgoldenrod;
    }
    </style>
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
                        <li><a href=""> &nbsp              </a></li>
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

   

    <section class="fbg">

    <div class="boxfback">
        <h4>If you have any suggestions or questions please comment below.</h4>
        <form action="#" method="post">
            <input class="form-control" type="text" name="comment" placeholder="Write something..."><br> 
               
              
        </form>
        <input class="btn btn-gold" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">  
               

        <br><br>
        <div class="scroll">
            <?php
            if (isset($_POST['submit'])) {
                if (isset($_POST['comment']) && !empty($_POST['comment'])) {
                    $comment = mysqli_real_escape_string($db, $_POST['comment']);
                    $sql = "INSERT INTO `comments` (comments) VALUES ('$comment')";
                    
                    if (mysqli_query($db, $sql)) {
                        $q = "SELECT * FROM `comments` ORDER BY `id` DESC";
                        $res = mysqli_query($db, $q);

                        echo "<table class='table table-bordered'>";
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<tr><td>{$row['comments']}</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Error: " . mysqli_error($db);
                    }
                } else {
                    echo "Comment cannot be empty.";
                }
            } else {
                $q = "SELECT * FROM `comments` ORDER BY `id` DESC"; 
                $res = mysqli_query($db, $q);

                echo "<table class='table table-bordered'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr><td>".htmlspecialchars($row['comments'])."</td></tr>";
                }
                echo "</table>";
            }
            ?>
        </div>
    </div>
    </section>
    <footer>
        <p style="color: white; text-align: right;">
            Email : Thisrusanduthilina@gmail.com <br><br>
            Mobile : +0751234567
        </p>
    </footer>
</body>
</html>
