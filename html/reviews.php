<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../style.css?v=1.1">
    <title>Reviews</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <img src="https://icon-library.com/images/coding-icon-png/coding-icon-png-20.jpg" />
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./courses.php">Courses</a></li>
                <li class="active"><a href="#">Reviews</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <?php 
                    if (isset($_SESSION['username'])) {
                        echo "<li><a href='./profile.php'>Profile</a></li>";
                        echo "<li><a href='../includes/logout.php'>Logout</a></li>";
                    } else {
                        echo '<li><a href="./login.php">Login/Register</a></li>';
                    }
                ?>
            </ul>
        </div>
    </nav>

    <main class="reviews__main">
        <section class="reviews__content">
            <div class="universal__welcome">
                <h4>Reviews</h4>
            </div>

            <section class="reviews__comments">
            <div class="row">
                <div class="col s6">
                    <div class="reviews__comment-box">
                        <h6><i class="small material-icons">account_circle</i><b>Mary Sinclair</b></h6>
                        <p>This bootcamp is the one to join. Friendly staffs, 
                            comfortable environment, just all round amazing. 
                            I recommend to anyone who wants to get into coding.
                        </p>
                    </div>
                </div>

                <div class="col s6">
                    <div class="reviews__comment-box">
                        <h6><i class="small material-icons prefix">account_circle</i><b>James Mclaren</b></h6>
                        <p>I have learnt alot from this bootcamp. The environment
                            is friendly and the lecturers hold your hands right
                            throughout the program to ensure that you comprend the 
                            concept being taught.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <div class="reviews__comment-box">
                        <h6><i class="small material-icons">account_circle</i><b>Kim Benjamin</b></h6>
                        <p>I joined this bootcamp to learn the javascript programming language. 
                            I have already gained great understanding of html and css and I need
                            Javascript to get to make my frontend skills complete. The lectures
                            taught Javascript so well I was able to understand and got a frontend
                            job imediately after the end of the course.
                        </p>
                    </div>
                </div>

                <div class="col s6">
                    <div class="reviews__comment-box">
                        <h6><i class="small material-icons">account_circle</i><b>Luke Skywalker</b></h6>
                        <p> I want to become a mobile developer. So I decided to choose the 
                            kotlin and the java programming languages to learn. Both were quite
                            difficult for me to grasp but my lecturers stand by me and help me
                            comprendend the topics I was not clear on. Now I can futher my mobile 
                            development endeavour by learning frameworks such as jetpack compose for kotlin and
                            the xml for java.
                        </p>
                    </div>
                </div>
            </div>

            </section>
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