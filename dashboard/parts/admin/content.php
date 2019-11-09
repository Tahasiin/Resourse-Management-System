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
                            <form method="POST" action="" autocomplete="nope">

                                <div>
                                    <label>Admin Email</label>
                                    <input placeholder="Enter Your Email" type="email"   name="admin_email" value="<?php echo $row['admin_email'] ?>" required="">
                                </div>
                                <br/>
                                <div>
                                    <label>Admin Password </label>
                                    <input placeholder="Enter Your Password" type="text" name="admin_password" value="<?php echo $row['admin_password'] ?>" required="">
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
                                <form method="POST" action="" enctype="multipart/form-data" autocomplete="nope">
                                    <div class="col-sm-5">
                                        <label>Choose Image </label>
                                        <div class="image-upload">
                                            <label for="file-input">
                                                <img src="../gallery/camera.png" height="100" width="100"/>
                                            </label>
                                            <input id="file-input" type="file" onchange="loadFile(event)" name="admin_image" />
                                        </div>
                                        <br/>
                                        <br/>
                                        <input type="submit" name="change" class="btn btn-dark" style="width:100px;height: 100px;padding: none"  value="Update">
                                    </div>
                                </form>
                                <div class="col-sm-7">
                                    <img  id="output" src="<?php echo $row['admin_image']; ?>" style="border: 1px solid;height: 280px;width: 250px"/>
                                </div>
                                <script>
                                    var loadFile = function (event) {
                                        var output = document.getElementById('output');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>


                            </div>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
