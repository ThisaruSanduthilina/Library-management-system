<?php
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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
                    <a class="navbar-brand" href="#">Books</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                       
                        <li><a href="student_login.php"> logout</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section  class="books-background">
        
        <div class="booksbg">
            
            <!-- Move the heading outside the table's container div -->
            <h2>List of Books</h2>
            <div class="bookst">
            <?php
            $query = "SELECT * FROM books ORDER BY name ASC";
            $res = mysqli_query($db, $query);

            if ($res) {
                echo "<table class='table table-bordered table-hover'>";
                echo "<tr style='background-color:white;'>";
                // Table header
                echo "<th>ID</th>";
                echo "<th>Book Name</th>";
                echo "<th>Author</th>";
                echo "<th>Edition</th>";
                echo "<th>Status</th>";
                echo "<th>Quantity</th>";
                echo "<th>Department</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['bid'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['authors'] . "</td>";
                    echo "<td>" . $row['edition'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Error fetching data from the database.</p>";
            }
            ?>
        </div>
        </div>
    </section>
    <footer>
        <p style="color: white; text-align: right;">
            Email: Thisrusanduthilina@gmail.com <br><br>
            Mobile: +0751234567
        </p>
    </footer>
</body>
</html>
