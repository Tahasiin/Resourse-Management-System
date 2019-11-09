<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:../login/admin.php');
    exit;
}
require '../database/connection.php';
$warning = "";
if (isset($_POST['search'])) {
    $admin_pin = $_GET['admin_pin'];
    $pin = $_POST['member_pin'];
    $query = "SELECT member_pin FROM faculty WHERE member_pin = '$pin'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($rows = $result->fetch_assoc()) {
            $pin = $rows["member_pin"];
            session_start();
            $_SESSION['member_pin'] = $pin;
            header('Location:../dashboard/faculty_info.php?admin_pin=' . $admin_pin);
        }
    } else {
        $warning = "The Pin does not exist !";
    }
}
?>
<?php
session_start();
$pin = $_SESSION['admin_pin'];
$sql = "SELECT *FROM admin WHERE admin_pin='$pin'";

$message = "";

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
                    td{font-family: 'Slabo 27px', serif;text-align: center}
                    th{font-family: 'Slabo 27px', serif;text-align: center !important;background: #6666ff;color:white !important}
                </style>

                <?php include './parts/css.php'; ?>


            </head>
            <?php $active3 = 'active'; ?>
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
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <form method="POST" action="">
                                            <input type="hidden" name="admin_pin" value="<?php echo $admin_pin ?>" />
                                            <input id="myInput" type="text" name="member_pin" placeholder="Search.." required="">
                                            <span style="text-align: center;color:red"><?php echo $warning; ?></span>
                                            <input type="submit" name="search" value="Search Pin" class="btn btn-default btn-fill"/>
                                        </form>
                                    </div>
                                    <div class="col-sm-3"></div>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <h4>FACULTY'S TABLE</h4>
                                            <table class="table table-bordered table-primary table-hover table-responsive " style="text-align: center">
                                                <thead>
                                                    <tr>
                                                        <th>Serial No</th>
                                                        <th>Name</th>
                                                        <th>Designation</th>
                                                        <th>Faculty</th>
                                                        <th>Pin</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <h3 style="color:red;font-family: 'rajdhani',sans-serif;text-align: center"> 
                                                    <?php echo $message ?>
                                                </h3>
                                                <tbody id="myTable">
                                                    <?php
                                                    $i = 1;
                                                    $query = "SELECT * FROM `faculty`";
                                                    $result = $conn->query($query);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while ($rows = $result->fetch_assoc()) {
                                                            ?>
                                                            <tr>

                                                                <td><?php echo $i++ ?></td>
                                                                <td><?php echo $rows['member_name'] ?></td>
                                                                <td><?php echo $rows['member_type'] ?></td>
                                                                <td><?php echo $rows['faculty_name'] ?></td>
                                                                <td><?php echo $rows['member_pin'] ?></td>
                                                                <td><?php if ($rows['status'] == 'active') { ?>
                                                                        <span style="color:green;">&ensp;<?php echo $rows['status'] ?></span>
                                                                    <?php } else {
                                                                        ?>
                                                                        <span style="color:red;">&ensp;<?php echo $rows['status'] ?></span>
                                                                    <?php } ?>
                                                                </td>

                                                            </tr>

                                                            <?php
                                                        }
                                                    } else {
                                                        $message = "NO DATA FOUND !";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
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

            <?php include './parts/scripts.php'; ?>

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