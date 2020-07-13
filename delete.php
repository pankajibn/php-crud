<?php
if (!empty($_GET['id'])) {
    // require connection
    require_once 'includes/db.php';

    $student_id = $_GET['id'];
    $del_query = "DELETE FROM `students` WHERE id = '" . $student_id . "'";
    $result = mysqli_query($conn, $del_query);
    if ($result) {
        header('location:/crud/index.php?msg=del');
    }
}
