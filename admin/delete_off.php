<?php
    include('../koneksi.php');
    $id = $_GET['id'];
    //Connect DB
    //Create query based on the ID passed from you table
    //query : delete where Staff_id = $id
    // on success delete : redirect the page to original page using header() method

    // sql to delete a record
    // $sql = "DELETE FROM user WHERE user_id = $id"; 

    // sql to update a record
    $sql = "update `user` set status='0' where user_id='$id'";



    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: admin_table.php');
        exit;
    } else {
        echo "Error deleting record";
    }
?>