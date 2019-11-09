<!--//Including Login Function-->
<?php include './query/faculty_login.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>School Management System</title>
        <link rel="stylesheet" href="../css/login.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            history.pushState(null, null, null);
            window.addEventListener('popstate', function () {
                history.pushState(null, null, null);
            });
        </script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-6">
                <h3><u>RESOURCE MANAGEMENT SYSTEM</u></h3>
            </div>
            <div class="col-sm-6">
                <h4><a href="student.php">Student Login</a>&emsp;||&emsp;<a href="faculty.php" class="active">Faculty Login</a>&emsp;||&emsp;<a href="admin.php">Admin Login</a></h4>
            </div>
        </div>
        <div class="container">
            <div class="form" style="box-shadow: 5px 10px 18px #888888">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="../gallery/logo.png" height="120" width="120"/>
                    </div>
                    <div class="col-sm-8" style="box-shadow: 5px 10px 18px #888888">
                        <div class="head">FACULTY<br><h3><b>Sign in</b></h3></div>
                        <br/>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="nope" >
                            <input placeholder="Enter Member Pin" type="text" name="member_pin" required="" autocomplete="nope">
                            <br/><br/>
                            <input placeholder="Enter Password" type="password" name="member_password" required="" autocomplete="new-password"><br/><br/>
                            <div class="bottom"><h6>No account? <a href="../registration/faculty.php">REGISTRATION</a></h6></div>
                            <input type="submit" name="login" class="submit btn-dark"  value="Sign In">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
