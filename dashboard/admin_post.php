<?php
//access_through_url disabled function
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:../login/admin.php');
    exit;
}
//starting session
session_start();

//define url in varaiable
$uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$_SESSION['previous_location'] = $uri;
//database connection
require '../database/connection.php';
//receiving admin pin with get method
$pin = $_SESSION['admin_pin'];
//fetching data
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
                <script src="ckeditor/ckeditor.js"></script>

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
            <?php $active5 = 'active'; ?>
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
                                    <style>
                                        form input{ border:1px solid !important}
                                    </style>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <section>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-sm-offset-2">
                                                                    <div>
                                                                        <h2>Admin Post</h2>
                                                                    </div>
                                                                    <form method="post" data-form-title="CREATE A POST" enctype="multipart/form-data" autocomplete="nope" action="<?php echo $uri ?>">
                                                                        <input type="hidden" name="posted_by" value="ADMIN">
                                                                        <input type="hidden" name="poster_name" value="<?php echo $row['admin_name'] ?>">
                                                                        <input type="hidden" name="poster_pin"  value="<?php echo $row['admin_pin'] ?>">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="post_subject" placeholder="Post Subject*" required="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <textarea name="post_description" id="editor1" rows="10" cols="80"></textarea>
                                                                            <script>
                                                                                CKEDITOR.replace('editor1');
                                                                            </script>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="post_link"  placeholder="Link*">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="file" class="form-control" name="post_file" placeholder="File*" autocomplete="off" >
                                                                        </div>
                                                                        <div>
                                                                            <input type="submit" value="POST" name="post" class="btn btn-lg btn-danger" style="height: 50px;background: #000">
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

                                </div>


                            </div>
                        </div>

                        <!--footer-->

                        <?php include './parts/footer.php'; ?>

                        <!--end footer-->
                    </div>
                </div>



            </body>
            <!--mastering scripts-->
            <?php include './parts/scripts.php'; ?>

            <!--posting function-->
            <?php
            if (isset($_POST['post'])) {
                $uploadOk = 1;

                $subject = $_POST['post_subject'];
                $description = $_POST['post_description'];
                $link = empty($_POST['post_link']) ? 'null' : $_POST['post_link'];
                $posted_by = $_POST['posted_by'];
                $name = $_POST['poster_name'];
                $pin = $_POST['poster_pin'];

                $date = date_default_timezone_set('Asia/Dhaka');
                $date = date('d-m-Y');

                $time = date_default_timezone_set('Asia/Dhaka');
                $time = date("h:i:sa");


                $directory = '../uploads/admin/';
                $file = $directory . basename($_FILES['post_file']['name']);
                move_uploaded_file($_FILES['post_file']['tmp_name'], $file);



                $sql = "INSERT INTO `posts`(`post_subject`, `post_description`, `post_link`, `post_file`, `posted_by`, `poster_name`, `poster_pin`, `post_date`, `post_time`) VALUES ('$subject','$description','$link','$file','$posted_by','$name','$pin','$date','$time')";
                if ($conn->query($sql) === TRUE) {
                    $success = "Posted Successfully !";
                    echo "<script type='text/javascript'>alert('$success');</script>";
                    echo"<script>document.location=''$uri'';</script>";
                } else {
                    $message = "Sorry ! Something went wrong !";
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