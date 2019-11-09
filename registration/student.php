<!--mastering registration function-->
<?php include './query/student_registration.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>School Management System</title>
        <!--custom styling-->
        <link rel="stylesheet" href="../css/registration.css" />
        <!--bootstrap-->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <!--fonts-->
        <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Grenze&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--browser back-button disable script-->
        <script>
            history.pushState(null, null, null);
            window.addEventListener('popstate', function () {
                history.pushState(null, null, null);
            });
        </script>
        <style>
            ::-webkit-scrollbar {
                display: none;
            }


        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-6">
                <h3 style="text-align: center"><u>RESOURCE MANAGEMENT SYSTEM</u></h3>
            </div>
            <div class="col-sm-5">
                <h4><a href="../login/student.php"><i class="fa fa-sign-in">&ensp;  SIGN-IN</i></a></h4>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!--registration form-->
                    <div class="form">
                        <div class="head">STUDENT<br><h3><b>Registration Form</b></h3></div>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="nope">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <label>Full Name </label>
                                        <input placeholder="Enter Your Name"  type="text"  name="student_name">
                                    </div><br/>
                                    <div>
                                        <label>Select Class </label>
                                        <input placeholder="Select Your Class"  type="text" list="class"  name="student_class">
                                        <datalist id="class">
                                            <option>Six</option>
                                            <option>Seven</option>
                                            <option>Eight</option>
                                            <option>Nine</option>
                                            <option>Ten</option>
                                        </datalist>
                                    </div><br/>
                                    <div>
                                        <label>Class Roll </label>
                                        <input placeholder="Enter Your Roll" type="number"  min="1" max="9999"  name="student_roll" required="">
                                    </div><br/>
                                    <div>
                                        <label> Student Pin </label>
                                        <input placeholder="Enter Your Pin" min="1" pattern=".{6,}" max="99999999"  type="text"  name="student_pin" required="">
                                    </div><br/>
                                    <div>
                                        <label>Email Address </label>
                                        <input placeholder="Enter Your Email" type="mail"   name="student_email" required="">
                                    </div><br/>
                                    <div>
                                        <label>Username </label>
                                        <input placeholder="Enter Your username" type="text"   name="student_username" required="">
                                    </div>
                                </div>
                                <div class="col-sm-6" style="border-left:1px solid">

                                    <div>
                                        <label>Password </label>
                                        <input placeholder="Enter Your Password" pattern=".{6,}" name="student_password" id="password"  type="password" type="password" required="">
                                    </div><br/>
                                    <div>
                                        <label>Confirm Password </label>
                                        <input placeholder="Retype Your Password" name="confirm_password" id="confirm_password"  onkeyup='check();'  type="password" required="">
                                        <span id='message'></span>
                                    </div><br/>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Chose Image </label>
                                            <div class="image-upload">
                                                <label for="file-input">
                                                    <img src="../gallery/camera.png" height="100" width="100"/>
                                                </label>

                                                <input id="file-input"type="file" onchange="loadFile(event)" name="student_image"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <img  id="output" height="280" width="250"/>
                                        </div>
                                        <script>
                                            var loadFile = function (event) {
                                                var output = document.getElementById('output');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                            };
                                        </script>
                                    </div>
                                    <br/>

                                    <input type="submit" name="submit" class="btn btn-dark"/>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end registration form-->
                </div>
            </div>
        </div>
        <!--password confirmation checking script-->
        <script>
            var check = function () {
                if (document.getElementById('password').value ==
                        document.getElementById('confirm_password').value) {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Password matched';
                } else {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'not matching';
                }
            }
        </script>
    </body>
</html>

<!--closing database connection-->
<?php $conn->close() ?>