<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "sms";


// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

mysqli_query($conn,'SET CHARACTER SET utf8'); 
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                
<!--disabling browser back button script-->
<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>