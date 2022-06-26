<?php
    session_start();
    require "../components/cards.php";
    require "../includes/dbc.php";
    
    if (!isset($_SESSION['username'])) {
         header("Location: ./login.php?login=false");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css?v=1.1">
    <title>Courses</title>
</head>
<body onload="loadData()">

    <nav>
        <div class="nav-wrapper">
            <img src="https://icon-library.com/images/coding-icon-png/coding-icon-png-20.jpg" />
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li class="active"><a href="#">Courses</a></li>
                <li><a href="./reviews.php">Reviews</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <?php 
                    if (isset($_SESSION['username'])) {
                        echo "<li><a href='./profile.php'>Profile</a></li>";
                        echo "<li><a href='../includes/logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>
    <main class="courses__main">
        <section class="courses__content">
            <div class="universal__welcome">
                <?php 
                    if (isset($_SESSION['username'])) {
                        echo "<h4>Welcome ".$_SESSION['username']."</h4>";
                    } 
                ?>
            </div>
            
            <div class="index__information">
                <p>Here are all the courses currently provided by the boot camp: </p>
            </div>
            
            <div class="courses__searchBar">
                <div class="input-field col s6">
                    <input id="search_key" type="text" onkeyup="searchCourse(this.value)">
                    <label for="search_key">Search for course</label>
                </div>
            </div>
            
        
            <div class="courses__listing"></div>
        </section>
    </main>

    <footer>
        <div>
            <p>Malx Coding Bootcamp &copy;2022</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../js/coursesAjax.js"></script>
</body>
</html>