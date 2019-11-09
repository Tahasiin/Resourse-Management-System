<?php
//constructing database connection
require '../database/connection.php';
session_start();

//login function
if (isset($_POST['login'])) {
    $pin = $_POST['student_pin'];
    $password = $_POST['student_password'];
// checking query, the user is blocked or not.
    $sql = "SELECT `student_pin` FROM `students` WHERE student_pin='$pin' AND status = 'active'";
    $result = $conn->query($sql);
//    if the user is not blocked
    if ($result->num_rows > 0) {
//        checking login details
        $sql = "SELECT `student_username` FROM `students` WHERE student_pin='$pin' AND student_password = '$password'";
        $result = $conn->query($sql);
//        if login details are correct
        if ($result->num_rows > 0) {
//            fectching data from data-table
            while ($row = $result->fetch_assoc()) {
                $username = $row["student_username"];
                $_SESSION['student_username'] = $username;
//                redirecting to student dashoard
                header('Location:../dashboard/student.php?student_username=' . $username);
            }
        } 
//       warning alert ! if login details are incorrect
        else {
            $warning = "SORRY ! INCORRECT LOGIN DETAILS!";
            echo "<script type='text/javascript'>alert('$warning');</script>";
            echo"<script>document.location='student.php';</script>";
        }
    } 
//  warning alert ! if user is blocked or pin is incorrect
    else {
        $warning = "SORRY ! You are blocked! Or Incorrect Pin Number !";
        echo "<script type='text/javascript'>alert('$warning');</script>";
        echo"<script>document.location='student.php';</script>";
    }
}

//closing database connection
$conn->close();

?>