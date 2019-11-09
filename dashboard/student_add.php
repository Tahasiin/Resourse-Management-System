<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:../login/admin.php');
    exit;
}
session_start();

$uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$_SESSION['previous_location'] = $uri;

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
                <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
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
            <?php $active6 = 'active'; ?>
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
                                    <a class="navbar-brand" href="#"></a>
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
                                    <style>
                                        form input{ border:1px solid !important}
                                    </style>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <section>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-sm-offset-2" style="font-family: 'Titillium Web', sans-serif;">
                                                                    <div>
                                                                        <h4 style="font-family: 'Titillium Web', sans-serif;">Add Student Info</h4>
                                                                    </div>
                                                                    <form method="post" autocomplete="nope" action="<?php echo $uri ?>">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="student_name" placeholder="Student Name" required="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="student_class" placeholder="Student Class*" list="class" required="">
                                                                            <datalist id="class">
                                                                                <option>Six</option>
                                                                                <option>Seven</option>
                                                                                <option>Eight</option>
                                                                                <option>Nine</option>
                                                                                <option>Ten</option>
                                                                            </datalist>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="student_roll"  placeholder="Student_roll*" required="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="student_pin" placeholder="Student Pin*" required="">
                                                                        </div>
                                                                        <div>
                                                                            <input type="submit" value="Save" name="save" class="btn btn-lg btn-danger" style="height: 50px;background: #000">
                                                                        </div>
                                                                    </form>
                                                                    <br/>
                                                                    <br/>
                                                                    <br/>
                                                                    <br/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>


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
        if (isset($_POST['save'])) {


            $name = $_POST['student_name'];
            $class = $_POST['student_class'];
            $roll = $_POST['student_roll'];
            $student_pin = $_POST['student_pin'];


            $sql = "INSERT INTO `student_auth_info`(`student_name`, `student_class`, `student_roll`, `student_pin`) VALUES ('$name','$class','$roll','$student_pin')";
            if ($conn->query($sql) === TRUE) {
                $success = "Student Info addeed successfully !";
                echo "<script type='text/javascript'>alert('$success');</script>";
                echo"<script>document.location=''$uri'';</script>";
            } else {
                $message = " Data already exists !";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo"<script>document.location=''$uri'';</script>";
            }
        }
        ?>



        </html>
        <?php
    }
} else {
    header('Location:../login/admin.php');
}
?> 

<?php
$conn->close();
?>