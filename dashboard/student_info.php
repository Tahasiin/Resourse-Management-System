<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:../login/admin.php');
    exit;
}
session_start();
require '../database/connection.php';
$pin = $_SESSION['admin_pin'];
$sql = "SELECT *FROM admin WHERE admin_pin='$pin'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
        <!doctype html>
        <html lang="en">
            <head>
                <meta charset="utf-8" />
                <link rel="icon" type="image/png" href="assets/img/school.jpg">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

                <title>Resource Management System</title>

                <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
                <meta name="viewport" content="width=device-width" />
                <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap" rel="stylesheet">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $("#myInput").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>

                <style>

                    u{color: red}

                </style>

                <?php include './parts/css.php'; ?>

            </head>
            <?php $active4 = 'active'; ?>
            <body>

                <div class="wrapper">

                    <!--mastering sidebar-->
                    <?php include './parts/admin/sidebar.php'; ?>

                    <div class="main-panel">
                        <nav class="navbar navbar-default navbar-fixed">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="#">User</a>
                                </div>
                                <div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="admin_logout.php">
                                                <p>Log out</p>
                                            </a>
                                        </li>
                                        <li class="separator hidden-lg hidden-md"></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="content">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-sm-3">

                                        <div style="border-right: 1px solid;margin-top: 50%">
                                            <form method="POST" action="">
                                                <div class="input-group">
                                                    <input type="text"  name="student_pin" placeholder="Enter Student "><br/><br/>
                                                    <input type="submit" name="search" value="Search " style="background: wheat">
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                    <div class="col-sm-1"></div>

                                    <form method="POST" action="student_info.php?admin_pin=<?php echo $row['admin_pin'] ?>">
                                        <?php
                                        $pin = $_SESSION['student_pin'];
                                        $query = "SELECT * FROM students WHERE student_pin = '$pin'";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($rows = $result->fetch_assoc()) {
                                                ?>

                                                <div class="col-sm-8" style="border:1px solid;margin-top: 5%;min-height: 300px;padding: 3%">
                                                    <div class="col-sm-4"><img src="<?php echo $rows['student_image'] ?>" style="height: 250px;width: 200px"/></div>
                                                    <div class="col-sm-1"></div>
                                                    <div class="col-sm-5">

                                                        <u>Student Name :</u>&ensp;<?php echo $rows['student_name'] ?>
                                                        <br/>
                                                        <u>Student Class:</u>&ensp;<?php echo $rows['student_class'] ?>
                                                        <br/>
                                                        <u>Student ROll :</u>&ensp;<?php echo $rows['student_roll'] ?>
                                                        <br/>
                                                        <u>Student Pin:&ensp;</u><?php echo $rows['student_pin'] ?>
                                                        <br/>
                                                        <u>Student Email:</u>&ensp;<?php echo $rows['student_email'] ?>
                                                        <br/>
                                                        <u>Student Username :</u>&ensp;<?php echo $rows['student_username'] ?>
                                                        <br/>
                                                        <u>Student Password:</u>&ensp;<?php echo $rows['student_password'] ?>
                                                        <br/><br/>
                                                        <?php if ($rows['status'] == 'active') { ?>

                                                            <u>Status:</u><b style="color:green;font-size: 20px">&ensp;<?php echo $rows['status'] ?></b>


                                                            <input type="hidden" value="<?php echo $rows['student_pin'] ?>" name="student_pin" />
                                                            <input type="hidden" value="blocked" name="status" />
                                                            <input type="submit" style="color:red" value="BLOCK ?" name="change" />


                                                        <?php } else {
                                                            ?>

                                                            <u>Status:</u><b style="color:red;font-size: 20px">&ensp;<?php echo $rows['status'] ?></b>

                                                            <input type="hidden" value="<?php echo $rows['student_pin'] ?>" name="student_pin" />
                                                            <input type="hidden" value="active" name="status" />
                                                            <input type="submit" style="color:green" value="ACTIVE ?" name="change" />


                                                            <br/>
                                                        <?php } ?>
                                                        <input type="hidden" value="<?php echo $rows['id'] ?>" name="id" />
                                                        <input type="submit" style="color:red" value="DELETE ?" name="delete" onclick="return confirm('Are you sure you want to delete this item?');"/>


                                                    </div>

                                                </div>
                                                <?php
                                            }
                                        } else {
                                            $previous_location = $_SESSION['previous_location'];
                                            $warning = "Student Pin does not exists !";
                                            echo "<script type='text/javascript'>alert('$warning');</script>";
                                            echo"<script>document.location='$previous_location';</script>";
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--footer-->
                    
                    <?php include './parts/footer.php'; ?>
                    
                    <!--end footer-->

                </div>
            </div>


        </body>

        <?php include './parts/scripts.php'; ?>

        <?php
        if (isset($_POST['change'])) {

            $status = $_POST['status'];
            $pin = $_POST['student_pin'];

            $sql = "UPDATE `students` set `status` ='$status' WHERE `student_pin` = '$pin'";

            if ($conn->query($sql) === true) {
                $success = "Status Updated Successfully !";
                echo "<script type='text/javascript'>alert('$success');</script>";
                echo"<script>document.location='';</script>";
            } else {
                $warning = "Sorry ! Something went wrong!";
                echo "<script type='text/javascript'>alert('$warning');</script>";
                echo"<script>document.location='';</script>";
            }
        }
        ?>

        <?php
        if (isset($_POST['delete'])) {

            $id = $_POST['id'];

            $sql = "DELETE FROM students WHERE id='$id'";

            if ($conn->query($sql) === true) {
                $success = "Student Data Deleted !";
                echo "<script type='text/javascript'>alert('$success');</script>";
                echo"<script>document.location='';</script>";
            } else {
                $warning = "Sorry ! Something went wrong!";
                echo "<script type='text/javascript'>alert('$warning');</script>";
                echo"<script>document.location='';</script>";
            }
        }
        ?>

    </html>
    <?php
} else {
    header('Location:../login/admin.php');
}
?> 

<?php
$conn->close();
?>