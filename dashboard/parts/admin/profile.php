<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            <img src="./image/school.jpg" alt="..."/>
        </div>
        <div class="content">

            <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="<?php echo $row['admin_image'] ?>" onerror="this.src='../gallery/images.png'"/>

                    <h4 class="title">
                        <?php echo $row['admin_name'] ?><br />
                        <small>admin</small>
                    </h4>
                </a>
            </div>
            <style>
                u{color:blueviolet}
            </style>
            <p class="description text-center"> 
                <u>Pin:</u>&ensp;<?php echo $row['admin_pin'] ?><br/>
                <u>Password:&ensp;</u><?php echo $row['admin_password'] ?><br/>
                <u>Email:&ensp;</u><?php echo $row['admin_email'] ?>
            </p>



        </div>
        <hr>
        <div class="text-center">
            <a href="admin_updateInfo.php?admin_pin=<?php echo $row['admin_pin'] ?>"><button class="btn btn-simple">update profile<i class="fa fa-edit"></i></button></a>

        </div>
    </div>
</div>