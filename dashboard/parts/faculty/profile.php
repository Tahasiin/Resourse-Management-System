<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            <img src="./image/school.jpg" alt="..."/>
        </div>
        <div class="content">

            <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="<?php echo $row['member_image'] ?>" onerror="this.src='../gallery/images.png'"/>

                    <h4 class="title"><?php echo $row['member_name'] ?><br />
                        <small><?php echo $row['member_username'] ?></small>
                    </h4>
                </a>
            </div>
            <style>
                u{color:blueviolet}
            </style>
            <p class="description text-center"> 
                <u>Designation:</u>&ensp;<?php echo $row['member_type'] ?><br/>
                <u>Faculty Name:</u>&ensp;<?php echo $row['faculty_name'] ?><br/>
                <u>Pin:</u>&ensp;<?php echo $row['member_pin'] ?><br/>
                <u>Password:&ensp;</u><?php echo $row['member_password'] ?><br/>
                <u>Email:&ensp;</u><?php echo $row['member_email'] ?>
            </p>



        </div>
        <hr>
        <div class="text-center">
            <a href="faculty_updateInfo.php?member_username=<?php echo $row['member_username'] ?>"><button class="btn btn-simple">update profile<i class="fa fa-edit"></i></button></a>

        </div>
    </div>
</div>