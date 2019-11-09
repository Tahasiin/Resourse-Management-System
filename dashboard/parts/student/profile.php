<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            <img src="./image/school.jpg" alt="..."/>
        </div>
        <div class="content">

            <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="<?php echo $row['student_image'] ?>" onerror="this.src='../gallery/images.png'"/>

                    <h4 class="title"><?php echo $row['student_name'] ?><br />
                        <small><?php echo $row['student_username'] ?></small>
                    </h4>
                </a>
            </div>
            <style>
                u{color:blueviolet}
            </style>
            <p class="description text-center"> 
                <u>Class:</u>&ensp;<?php echo $row['student_class'] ?><br/>
                <u>Roll:</u>&ensp;<?php echo $row['student_roll'] ?><br/>
                <u>Pin:</u>&ensp;<?php echo $row['student_pin'] ?><br/>
                <u>Password:&ensp;</u><?php echo $row['student_password'] ?><br/>
                <u>Email:&ensp;</u><?php echo $row['student_email'] ?>
            </p>



        </div>
        <hr>
        <div class="text-center">
            <a href="student_updateInfo.php?student_username=<?php echo $row['student_username'] ?>"><button class="btn btn-simple">update profile<i class="fa fa-edit"></i></button></a>

        </div>
    </div>
</div>