<!--mastering registration function-->
<?php include './query/member_registration.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>School Management System</title>
        <link rel="stylesheet" href="../css/registration.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <h4><a href="../login/faculty.php"><i class="fa fa-sign-in">&ensp;  SIGN-IN</i></a></h4>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form">
                        <div class="head">FACULTY<br><h3><b>Registration Form</b></h3></div>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="nope">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <label>Full Name </label>
                                        <input placeholder="Enter Your Name" onfocus="this.value = ''; this.style.color = 'blue'" type="text"  name="member_name">
                                    </div><br/>
                                    <div>
                                        <label>Member Type </label>
                                        <input placeholder="Member Type" onfocus="this.value = ''; this.style.color = 'blue'" type="text" list="type"  name="member_type">
                                        <datalist id="type">
                                            <option>Teacher</option>
                                            <option>Official</option>
                                        </datalist>
                                    </div><br/>
                                    <div>
                                        <label>Faculty Name </label>
                                        <input placeholder="Faculty Name" type="text" name="faculty_name" list="name">
                                        <datalist id="name">
                                            <option>Academic</option>
                                            <option>Science</option>
                                            <option>Arts</option>
                                            <option>Commerce</option>
                                        </datalist>
                                    </div>
                                    <br/>
                                    <div>
                                        <label> Member Pin </label>
                                        <input placeholder="Enter Your Pin" min="1" max="99999999" onfocus="this.value = ''; this.style.color = 'blue'" type="text"  name="member_pin" required="">
                                    </div><br/>
                                    <div>
                                        <label>Email Address </label>
                                        <input placeholder="Enter Your Email" type="mail"  onfocus="this.value = ''; this.style.color = 'blue'" name="member_email" required="">
                                    </div><br/>
                                    <div>
                                        <label>Username </label>
                                        <input placeholder="Enter Your username" type="text"  onfocus="this.value = ''; this.style.color = 'blue'" name="member_username" required="">
                                    </div>
                                </div>
                                <div class="col-sm-6" style="border-left:1px solid">

                                    <div>
                                        <label>Password </label>
                                        <input placeholder="Enter Your Password" pattern=".{6,}" name="member_password" id="password" onfocus="this.value = ''; this.style.color = 'blue'" type="password" type="password" required="">
                                    </div><br/>
                                    <div>
                                        <label>Confirm Password </label>
                                        <input placeholder="Retype Your Password" name="confirm_password" id="confirm_password" onfocus="this.value = ''; this.style.color = 'blue'" onkeyup='check();'  type="password" required="">
                                        <span id='message'></span>
                                    </div><br/>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Chose Image </label>
                                            <div class="image-upload">
                                                <label for="file-input">
                                                    <img src="../gallery/camera.png" height="100" width="100"/>
                                                </label>

                                                <input id="file-input"type="file" onchange="loadFile(event)" name="member_image"/>
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
                </div>
            </div>
        </div>
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

<?php $conn->close() ?>