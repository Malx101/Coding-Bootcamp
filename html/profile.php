<?php 
    session_start();
    require '../includes/dbc.php';
    $conn = connection();

    $first_name_local = '';
    $last_name_local = '';
    $email_local = '';
    $username_local = '';
    $address_local = '';
    
    if(isset($_SESSION['id'])) {
        $query = "SELECT * FROM tbl_users WHERE id= ?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $_SESSION['id']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id,$first_name, $last_name, $email, $address, $username, $password);
        $stmt->fetch();

        //Assigning variables with database results
        $first_name_local = $first_name;
        $last_name_local = $last_name;
        $email_local = $email;
        $address_local = $address;
        $username_local = $username;

        $stmt->close();
        $conn->close();
    }
     
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/js-toastr@1.1.1/toast.css">
    <title>Profile</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <img src="https://icon-library.com/images/coding-icon-png/coding-icon-png-20.jpg" />
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./courses.php">Courses</a></li>
                <li><a href="./reviews.php">Reviews</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <?php 
                    if (isset($_SESSION['username'])) {
                        echo "<li class='active'><a href='#'>Profile</a></li>";
                        echo "<li><a href='../includes/logout.php'>Logout</a></li>";
                    } else {
                        echo '<li><a href="./login.php">Login/Register</a></li>';
                    }
                ?>
            </ul>
        </div>
    </nav>

    <main class="profile__main">
        <section class="profile__content">
            <div class="profile__switch">
                <div class="universal__welcome">
                    <h4 id="header_username"><?php echo $_SESSION['username'] ?> Details</h4>
                </div>
                <div class="switch">
                    <label>
                        disable
                        <input type="checkbox" id="toggleFields">
                        <span class="lever"></span>
                        enable
                    </label>
                </div>
            </div>

            <br><br>
            <section class="profile__user-data">
                <form  action="../includes/editValidation.php" method="POST" id="editForm">
                    <div class="row">
                        <div class="col s4">
                            <div class="input-field col s6">
                                <input disabled value="<?php echo $first_name_local;?>" id="first_name" name="first_name" type="text" class="validate inputtoggle">
                                <label for="first_name">First Name</label>
                            </div>
                        </div>

                        <div class="col s4">
                            <div class="input-field col s6">
                                <input disabled value="<?php echo $last_name_local;?>" id="last_name" name="last_name" type="text" class="validate">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="col s4">
                            <div class="input-field col s6">
                                <input disabled value="<?php echo $email_local;?>" id="email" type="text" name="email" class="validate inputtoggle">
                                <label for="email">Email</label>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col s6">
                            <div class="input-field col s6">
                                <input disabled value="<?php echo $username_local;?>" id="username" type="text" name="username" class="validate inputtoggle">
                                <label for="username">Username</label> 
                            </div>
                        </div>

                        <div class="col s6">
                            <div class="input-field col s6">
                                <input disabled value="<?php echo $address_local;?>" id="address" type="text" name="address" class="validate inputtoggle">
                                <label for="address">Address</label>
                            </div>
                        </div>
                    <div>

                    <div class="profile__button-collection">
                        <button disabled class="btn waves-effect" id="editBtn" type="submit" onclick="edit_data(); return false;" name="edit_submit">
                            Edit
                        </button>

                        <button type="button" id="modal_trigger" class="btn" style="background-color: #d6331d;">Unsubscribe</button>

                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                            <h4>Account Removal</h4>
                            <p>Are you sure you want to remove account?</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn waves-effect" id="cancelBtn" type="button" style="background-color: rgb(199, 199, 23)">
                                    No
                                </button>
                                <button class="btn waves-effect" id="deleteBtn" type="submit" name="delete_submit">
                                    Yes
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            
        </section>
    </main>

    <footer>
        <div>
            <p>Malx Coding Bootcamp &copy;2022</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../js/profileAjaxForm.js"></script>
    <script>
        var toggleFieldBtn = document.querySelector("#toggleFields");
        var modal_elem = document.querySelector('#modal1');
        let dismissible = true;
        var instance = M.Modal.init(modal_elem, dismissible);
        
        toggleFieldBtn.addEventListener("click", function(){
            var isDisabled = document.querySelector("#first_name").disabled;

            if(isDisabled) {
                document.querySelector("#first_name").disabled = false;
                document.querySelector("#last_name").disabled = false;
                document.querySelector("#email").disabled = false;
                document.querySelector("#username").disabled = false;
                document.querySelector("#address").disabled = false;
                document.querySelector("#editBtn").disabled = false;
                document.querySelector("#editBtn").style.backgroundColor = "rgb(199, 199, 23)";
            } else {
                document.querySelector("#first_name").disabled = true;
                document.querySelector("#last_name").disabled = true;
                document.querySelector("#email").disabled = true;
                document.querySelector("#username").disabled = true;
                document.querySelector("#address").disabled = true;
                document.querySelector("#editBtn").disabled = true;
                document.querySelector("#editBtn").style.backgroundColor = "";
            }
        });

        document.getElementById('cancelBtn').addEventListener('click', () => {
            instance.close();
        });

        document.getElementById("modal_trigger").addEventListener('click', () => {
            instance.open();
        });
    </script>
</body>
</html>