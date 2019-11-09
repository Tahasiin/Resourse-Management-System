<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:../login/admin.php');
    exit;
}
require '../database/connection.php';
session_start();
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

                <title>Human Resource Management System</title>

                <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
                <meta name="viewport" content="width=device-width" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                

                <?php include './parts/css.php'; ?>
                <style>
                    ::-webkit-scrollbar {
                        display: none;
                    }

                    form button{}
                </style>
            </head>
            <?php $active1 = 'active'; ?>
            <body>

                <div class="wrapper">

                    <!--mastering admin sidebar-->
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
                                    <div class="navbar-brand">
                                        <div class="col-sm-12 col-md-12 text-center">

                                            <form class="form-inline" style="margin-top: -25px" method="POST" action="admin_post_search.php?admin_pin=<?php echo $row['admin_pin'] ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Search For Post..." list="post" name="posted_by" required="">
                                                    <datalist id="post">
                                                        <option>ADMIN</option>
                                                        <option>FACULTY</option>
                                                        <option>STUDENT</option>
                                                    </datalist>
                                                </div>
                                                <button type="submit" name="search" class="btn btn-success">Search</button>
                                            </form>
                                        </div>
                                    </div>
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
                                    <div class="col-md-8">
                                        <div class="card" style="max-height: 500px;overflow: auto">

                                            <?php
                                            if (isset($_POST['posted_by'])) {

                                                $posted_by = $_POST['posted_by'];

                                                $sql = "SELECT *FROM posts WHERE posted_by = '$posted_by' ORDER BY `id` DESC";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while ($post = $result->fetch_assoc()) {
                                                        ?>

                                                        <div style="margin: 7%;border: 1px solid;min-height: 200px;border-radius: 10px;font-family: 'Titillium Web', sans-serif;padding: 10px;box-shadow: 5px 10px 18px #888888" id="delete<?php echo $post['id'] ?>">
                                                            <div>
                                                            <legend style="color:blue"><?php echo $post['post_subject'] ?></legend>
                                                            <h3><?php echo $post['poster_name'] ?>
                                                                <small style="text-transform:lowercase">
                                                                    <?php echo $post['posted_by'] ?>
                                                                    [ <?php echo $post['post_date'] ?> / <?php echo $post['post_time'] ?> ]
                                                                </small></h3>
                                                            <h5><?php echo $post['post_description'] ?></h5>
                                                            <br/>
                                                            <?php if ($post['post_link'] == 'null') { ?>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <h5><b>Visit the Link:</b><a href="<?php echo $post['post_link'] ?>" target="_blank">Click</a></h5>
                                                            <?php } ?>



                                                            <?php if ($post['post_file'] == '../uploads/admin/' || '../uploads/faculty/' || '../uploads/student/') { ?>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <h5><b>Download Link:</b><a href="<?php echo $post['post_file'] ?>" target="_blank">Click to download.</a></h5>
                                                            <?php } ?>
                                                            <hr/>
                                                            <!--delete data form-->
                                                            <button style="margin-left: 90%" title="Delete" type="submit" onclick="deleteAjax(<?php echo $post['id']; ?>)" >
                                                                <i style="color:red;" class="fa fa-trash" ></i>
                                                            </button>

</div
                                                            <!--end delete data form-->

                                                            <!--delete data funcion-->
                                                            <script type="text/javascript">

                                                                function deleteAjax(id) {

                                                                    if (confirm('are You sure?')) {

                                                                        $.ajax({

                                                                            type: 'post',
                                                                            url: 'delete_post.php',
                                                                            data: {delete_id: id},
                                                                            success: function (data) {

                                                                                $('#delete' + id).hide('slow');

                                                                            }

                                                                        });

                                                                    }


                                                                }

                                                            </script>

                                                        </div>

                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <fieldset>
                                                        <legend style="color:red">NO POST FOUND</legend>
                                                    </fieldset>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <!--Mastering Profile-->
                                    <?php include './parts/admin/profile.php'; ?>



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

        </html>
        <?php
    }
} else {
    header('Location:../login/admin.php');
}
?> 

<!--closing dtabase connection-->
<?php
$conn->close();
?>