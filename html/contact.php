<?php 
    session_start();
    include "../components/errorFunctions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.css">
    <link rel="stylesheet" href="../style.css?v=1.1">
    <title>Contact Us</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <img src="https://icon-library.com/images/coding-icon-png/coding-icon-png-20.jpg" />
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./courses.php">Courses</a></li>
                <li><a href="./reviews.php">Reviews</a></li>
                <li class="active"><a href="#">Contact</a></li>
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
    <main class="contact__main">
        <section class="contact__content">
            <div class="contact__left">
                <div class="contact__form-container">
                    <h5>Contact Us</h5>
                    <form method="POST" id="contactForm">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" name="first_name" class="validate" autocomplete="off">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" name="last_name" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="email" type="text" name="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="subject" type="text" name="subject" class="validate">
                            <label for="subject">Subject</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="message" name="message" class="materialize-textarea"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" id="submitcontactFormBtn" name="contact_submit">Send
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="contact__right">
                <div class="contact__business-card">
                    <h5>Business details</h5>
                    <hr>
                    <ul>
                        <li ><b>Location:</b> Mandeville, Perth Road 13<br><br></li>
                        <li><b>Contact Number:</b> 876-444-2405<br><br></li>
                        <li><b>Email:</b> malxbootcamp@gmail.com</li>
                    </ul>
                </div>
            </div>

        </section>
    </main>
    <footer>
        <div>
            <p>Malx Coding Bootcamp &copy;2022</p>
        </div>
    </footer>
    <script src="../js/contactAjaxForm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>