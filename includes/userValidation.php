<?php 
    require 'dbc.php';
    if(isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        $message = '';

        if(empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($confirm_password) || empty($address)) {
            $message = "emptyField";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "invalidEmail";
        } else if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name) || !preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
            $message = "invalidName";
        } elseif (strlen($password) < 8) {
            $message = "passwordLength";
        } elseif ($password !== $confirm_password) {
            $message = "passwordMatchError";
        } else {
            if (writeToDatabase($first_name, $last_name, $email, $address, $username, $password)) {
                setcookie("username", $username, time() + (86400 * 30), '/'); //86400 = 1 day
                $message = "registered";
            } else {
                $message = "not registered";
            }
        } 

        echo $message;
    } else if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            header("Location: ../html/login.php?loginstatus=emptyfields");
        } else {
            if (isSaved($username, $password)) {
                header("Location: ../index.php?loginstatus=success");
            } else {
                header("Location: ../html/login.php?loginstatus=fail");
            }
        }
    }

    
    function writeToDatabase ($firstName, $lastName, $email, $address, $username, $password) {
        //Connection to database
        $conn = connection();
        
        //Prepare and bind
        $query = "INSERT INTO tbl_users(first_name,last_name,email,address,username,password) VALUES (?,?,?,?,?,?);";
        $stmt = $conn->prepare($query);
        $actualPassword = password_hash($password, PASSWORD_DEFAULT); //Hashing password
        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $address, $username, $actualPassword);
        
        if ($stmt->execute())
        {
            $stmt->close();
            $conn->close();
            return true;
        }

        $stmt->close();
        $conn->close();
        return false;
    }

    function isSaved ($username, $pwd) {
        //Connection to database
        $conn = connection();

        //Prepare and bind
        $query = "SELECT id, username, password FROM tbl_users WHERE username=?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id,$username,$password);

        if($stmt->num_rows == 1) {
            $stmt->fetch();
            if(password_verify($pwd, $password)) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                $stmt->close();
                $conn->close();
                return true;
            }
        }
        $stmt->close();
        $conn->close();
        return false;
    }
?>
