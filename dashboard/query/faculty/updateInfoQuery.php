<?php

if (isset($_POST['update'])) {

    $username = $_GET['member_username'];

    $newusername = $_POST['member_username'];
    $password = $_POST['member_password'];

    $sql = "UPDATE `faculty` SET `member_username`='$newusername',`member_password`='$password' WHERE member_username = '$username' ";
    if ($conn->query($sql) === TRUE) {
        $success = "Update Completed Successfully !Please Login again.";
            echo "<script type='text/javascript'>alert('$success');</script>";
            echo"<script>document.location='../login/faculty.php';</script>";
    } else {
         echo "Error updating record:Error updating record:Error updating record:Error updating record: ".$conn->error;
    }
}
?>