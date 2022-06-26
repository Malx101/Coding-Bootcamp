<?php
    session_start();
    include "./components/cards.php";
    include "./components/errorFunctions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=1.1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.css">
    <title>Welcome</title>
</head>
<body>
    <?php 
        if(isset($_GET["loginstatus"])) {
            if($_GET['loginstatus'] == "success") {
                successMessage("loggedIn");
            } elseif ($_GET['loginstatus'] == "loggedout") {
                successMessage("loggedout");
            }
        } 
        
        if(isset($_GET['status'])) {
            if($_GET['status'] == "deleted") {
                successMessage("deleted");
            }
        }
    ?>
    <nav>
        <div class="nav-wrapper">
            <img src="https://icon-library.com/images/coding-icon-png/coding-icon-png-20.jpg" />
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="./html/courses.php">Courses</a></li>
                <li><a href="./html/reviews.php">Reviews</a></li>
                <li><a href="./html/contact.php">Contact</a></li>
                <?php 
                    if (isset($_SESSION['username'])) {
                        echo "<li><a href='./html/profile.php'>Profile</a></li>";
                        echo "<li><a href='./includes/logout.php'>Logout</a></li>";
                    } else {
                        echo '<li><a href="./html/login.php">Login/Register</a></li>';
                    }
                ?>
            </ul>
        </div>
    </nav>
    <main class="index__main">
        <div class="index__banner">
            <h1>Launch your coding endevours <span>with Malx Bootcamp🚀<span></h1>
        </div>

        <section class="index__content">
            <div class="universal__welcome">
                <?php 
                    if (isset($_SESSION['username'])) {
                        echo "<h4>Welcome ".$_SESSION['username']."</h4>";
                    } else {
                        echo "<h4>Welcome</h4>";
                    }
                    
                ?>
            </div>

            <div class="index__information">
                <p>Welcome to malx coding bootcamp where I teach a various number of programming languages such as Javascript, Python, Java etc.<br>
                    Currently our mode of teaching is fully online; however, in the future I intend to expand and have a facility that cater to persons who
                    grasp information better through face-to-face classes.
                </p>
                <br><br>
                <p>
                    Listed below are the most sold courses:
                </p>
            </div>

            <div class="index__popular-courses">
                <?php
                    $courses = array(array("kotlin", 
                                           "./images/kotlin.png", 
                                           "Learn Kotlin to become a android mobile developer<br><br>Cost: $20.00"
                                        ),
                                     array("JS", 
                                           "./images/javascript.png", 
                                           "Learn Javascript to make webpages look dynamic<br><br>Cost: $80.00"
                                        ),
                                     array("python", 
                                           "./images/python.png", 
                                           "Learn Python to build backend for websites<br><br>Cost: $12.00"
                                        )
                                    );
                                     
                    for($i=0; $i<count($courses); $i++)
                    {
                        for($j=0; $j<count($courses); $j++)
                        {
                            card($courses[$i][$j], $courses[$i][++$j], $courses[$i][++$j]);
                        }
                    } 
                ?>
            </div>
        </section>
    </main>

    <footer>
        <div>
            <p>Malx Coding Bootcamp &copy;2022</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>