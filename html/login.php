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
    <link rel="stylesheet" href="../style.css">
    <title>Login/Register</title>
</head>
<body>
    <script>
        let url = window.location.href.split('?')[1];
        let parameters = new URLSearchParams(url);

        for(let pair of parameters.entries()) {
            if(pair[0] == "register" && pair[1] == "success") {
                toastr.setPosition('top-center');
                toastr.message("Registered", 'success', 3000);
            }
        }    
    </script>
    <nav>
        <div class="nav-wrapper">
            <img src="https://icon-library.com/images/coding-icon-png/coding-icon-png-20.jpg" />
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./courses.php">Courses</a></li>
                <li><a href="./reviews.php">Reviews</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <li class="active"><a href="#">Login/Register</a></li>
            </ul>
        </div>
    </nav>

    <main class="login__main">
        <section class="login__content">
            <div class="login__form-container">
                <div class="login__toggle-container">
                    <div id="login__active-toggle-btn"></div>
                    <button type="button" class="login__toggle-btn" onclick="login()">Login</button>
                    <button type="button" class="login__toggle-btn" onclick="register()">Register</button>
                </div>

                <form id="login" action="../includes/userValidation.php" method="post">
                    <div class="input-field col s6">
                        <?php 
                            if (isset($_COOKIE['username'])) {
                                echo '<input id="login_username" type="text" value="'.$_COOKIE['username'].'" name="username" class="validate">
                                <label for="login_username">Username</label>';
                            } else {
                                echo '<input id="login_username" type="text" name="username" class="validate">
                                <label for="login_username">Username</label>';
                            }
                        ?>
                    </div>

                    <div class="input-field col s12">
                        <input id="login_password" type="password" name="password" class="validate">
                        <label for="login_password">Password</label>
                    </div>

                    <button class="btn waves-effect waves-light" type="submit" name="login">
                        Login
                    </button>

                    <?php 
                        if(isset($_GET['loginstatus'])) {
                            $loginStatus = $_GET['loginstatus'];

                            if($loginStatus == "emptyfields") {
                                showError("emptyField");
                            } elseif ($loginStatus == "fail") {
                                showError("incorrectCredential");
                            }
                        } elseif (isset($_GET['login'])) {
                            if ($_GET['login'] == "false") {
                                showError("loginNeeded");
                            }
                        }
                    
                    ?>
                </form>

                <form id="register" method="POST">
                    <div class="input-field col s6">
                        <input id="firstname" type="text" name="first_name" class="validate">
                        <label for="firstname">First name</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="lastname" type="text" name="last_name" class="validate">
                        <label for="lastname">Last name</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="email" type="text" name="email" class="validate">
                        <label for="email">Email</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="address" type="text" name="address" class="validate">
                        <label for="address">Address</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="username" type="text" name="username" class="validate">
                        <label for="username">Username</label>
                    </div>
        

                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">Password</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="confirmpassword" type="password" name="confirm_password" class="validate">
                        <label for="confirmpassword">Confirm Password</label>
                    </div>

                    <button id="registerBtn" class="btn waves-effect waves-light" type="submit" name="register">
                        Register
                    </button>
                </form>
            </div>
           
            <?php 
                if (isset($_GET['registerstatus'])) {
                    if ($_GET['registerstatus'] == "success") {
                        successMessage("registered");
                     }
                }         
            ?>
        </section>
        <footer>
        <div>
            <p>Malx Coding Bootcamp &copy;2022</p>
        </div>
    </footer>
    </main>

    

    <script>
        var loginForm = document.getElementById("login");
        var registerForm = document.getElementById("register");
        var toggleBtn = document.getElementById("login__active-toggle-btn");
        var loginContainer = document.querySelector(".login__content");
        var loginContent = document.querySelector(".login__content");

        function register(){
            loginForm.style.display = "none";
            registerForm.style.display = "block";
            toggleBtn.style.left = "110px";
            loginContainer.style.padding = "120px 0 120px 0";
        }

        function login(){
            registerForm.style.display = "none";
            loginForm.style.display = "block";
            toggleBtn.style.left = "0";
            loginContainer.style.padding = "0 0 0 0";
        }

        
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../js/registerAjaxForm.js"></script>
</body>
</html>