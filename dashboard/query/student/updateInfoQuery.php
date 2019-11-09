<?php

if (isset($_POST['update'])) {

    $username = $_GET['student_username'];

    $newusername = $_POST['student_username'];
    $password = $_POST['student_password'];

    $sql = "UPDATE `students` SET `student_username`='$newusername',`student_password`='$password' WHERE student_username = '$username' ";
    if ($conn->query($sql) === TRUE) {
        $success = "Update Completed Successfully !Please Login again.";
            echo "<script type='text/javascript'>alert('$success');</script>";
            echo"<script>document.location='../login/student.php';</script>";
    } else {
         echo "Error updating record:Error updating record:Error updating record:Error updating record: ".$conn->error;
    }
}
?>