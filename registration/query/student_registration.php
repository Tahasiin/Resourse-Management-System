<?php
//database connection
require '../database/connection.php';
$success = '';
$warning = '';
//registration function
if (isset($_POST['submit'])) {
//    form data variables
    $name = $_POST['student_name'];
    $class = $_POST['student_class'];
    $roll = $_POST['student_roll'];
    $pin = $_POST['student_pin'];
    $email = $_POST['student_email'];
    $username = $_POST['student_username'];
    $password = $_POST['student_password'];
    $cpassword = $_POST['confirm_password'];
//image upload
    $directory = '../gallery/students/';
    $image = $directory . basename($_FILES['student_image']['name']);
    move_uploaded_file($_FILES['student_image']['tmp_name'], $image);

//   checking query; data exists or not
    $check = "SELECT * FROM `student_auth_info` WHERE student_name = '$name' AND student_roll='$roll' AND student_class = '$class' AND student_pin = '$pin'  ";
    $result = $conn->query($check);
    //if authentication data exists ;
    if ($result->num_rows > 0) {
        $sql = "INSERT INTO `students`(`student_name`, `student_class`, `student_roll`, `student_pin`, `student_email`, `student_username`, `student_password`, `student_image`) VALUES ('$name','$class','$roll','$pin','$email','$username','$password','$image')";
        if ($conn->query($sql) === TRUE) {
            $success = "Registration Process Completed Successfully !";
            echo "<script type='text/javascript'>alert('$success');</script>";
            echo"<script>document.location='student.php';</script>";
        } 
//        if data is duplicate;warning alert
        else {
            $message = "Stduent Data Already Exist";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo"<script>document.location='student.php';</script>";
        }
    } 
//    if authentication data not exists ;warning alert
    else {
        $warning = "NO STUDENT DATA MATCHED !";
        echo "<script type='text/javascript'>alert('$warning');</script>";
        echo"<script>document.location='student.php';</script>";
    }
}
?>