<div class="col-sm-8">
    <div class="card">
        <div class="row">
            <div class="form">

                <div id="exTab2" class="container col-sm-12 ">	
                    <ul class="nav nav-tabs">
                        <li class="active"><a  href="#1" data-toggle="tab">Change Info</a></li>
                        <li><a href="#2" data-toggle="tab">Change Picture</a></li>
                    </ul>

                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            <div class="head"><h3><b>Update Form</b></h3></div>
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="nope">

                                <div>
                                    <label>Student Username</label>
                                    <input placeholder="Enter Your Username" type="text"  onfocus="this.value = ''; this.style.color = 'blue'" name="student_username" value="<?php echo $row['student_username'] ?>" required="">
                                </div><br/>
                                <div>
                                    <label>Student Password </label>
                                    <input placeholder="Enter Your Password" type="text"  onfocus="this.value = ''; this.style.color = 'blue'" name="student_password" value="<?php echo $row['student_password'] ?>" required="">
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <input type="submit" name="update" class="submit btn-dark" style="width:100%"  value="Update">
                            </form>
                        </div>

                        <br/>
                        <br/>

                        <div class="tab-pane" id="2">
                            <div class="row">
                                <form method="POST" action="student_updateInfo.php?student_username=<?php echo $row['student_username'] ?>" enctype="multipart/form-data" autocomplete="nope">
                                    <div class="col-sm-5">
                                        <label>Choose Image </label>
                                        <div class="image-upload">
                                            <label for="file-input">
                                                <img src="../gallery/camera.png" height="100" width="100"/>
                                            </label>
                                            <input id="file-input" type="file" onchange="loadFile(event)" name="student_image" required=""/>
                                        </div>
                                        <br/>
                                        <br/>
                                        <input type="submit" name="change" class="btn btn-dark" style="width:100px;height: 100px;padding: none" onClick="window.location.reload();"  value="Update">
                                    </div>
                                    <div class="col-sm-7">
                                        <img  id="output" src="<?php echo $row['student_image']; ?>" style="border: 1px solid;height: 280px;width: 250px"/>
                                    </div>
                                    <script>
                                        var loadFile = function (event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
