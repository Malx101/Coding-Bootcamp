<?php 
    session_start();
    require '../includes/dbc.php';

    if(isset($_POST['edit_submit'])) {
        $conn = connection();
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $address = $_POST['address'];

        $message = '';

        if(empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($address)) {
            $message = "emptyField";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "invalidEmail";
        } else {
            $_COOKIE['username'] = $username;
            $_SESSION['username'] = $username;
            $query = "UPDATE tbl_users SET first_name=?, last_name=?, email=?, address=?, username=? WHERE id=?;";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssi", $first_name, $last_name, $email, $address, $username, $_SESSION['id']);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            $message = "editSuccessful";
        }

        //Send to ajax request
        echo $message;
    } elseif (isset($_POST['delete_submit'])) {
        $username = $_POST['username'];

        if(isset($_COOKIE['username'])) {
            unset($_COOKIE['username']);
            setcookie('username', null, -1, '/');
        }

        $conn = connection();
        $query = "DELETE FROM tbl_users WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        session_destroy();
        header("Location: ../index.php?status=deleted");
    }

?>