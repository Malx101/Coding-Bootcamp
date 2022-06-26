<?php
    require './dbc.php';
    require '../components/cards.php';

    $conn = connection();
    if(isset($_GET['q'])) {
        if(empty($_GET['q'])) { 
            $query = "SELECT * FROM tbl_service;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()) {
                card($row['title'], $row['image_path'], $row['content']);
            }
            $conn->close();
            $stmt->close();
        } else {
            $search_key = "%".$_GET['q']."%";
            $query = "SELECT * FROM tbl_service WHERE title LIKE ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $search_key);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    card($row['title'], $row['image_path'], $row['content']);
                }
            } else {
                echo "<h3>Course Not Found</h3>";
            }
            
            $conn->close();
            $stmt->close();
        }
    } elseif(!isset($_GET['q'])) {
        $query = "SELECT * FROM tbl_service;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()) {
            card($row['title'], $row['image_path'], $row['content']);
        }
        $conn->close();
        $stmt->close();
    }
    

?>