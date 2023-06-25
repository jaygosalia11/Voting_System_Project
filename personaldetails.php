<?php
    include("connect.php");
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
?>
<html>
    <head>
        <title>َProfile</title>
        <link rel="stylesheet" href="profiledetails.css">
    </head>
    <body>
        <div class="profile">
            <h1>My Profile</h1>
        </div>

        <div class="details_profile">
            <img src="uploadedimage/<?php echo $userdata['image'];?>" height = "150" width="150">
            <br>
            <br>
            <b>Name:</b>
            <?php echo $userdata['first_name']; ?>  
            <br>
            <br>
            <b>Email id:</b>
            <?php echo $userdata['email']; ?> 
            <br>
            <br> 
            <b>Address:</b>
            <?php echo $userdata['address']; ?>  
            <br>
            <br>
            <b>Mobile Number:</b>
            <?php echo $userdata['number']; ?> 
            <br>
            <br>
            <b>Status:</b>
            <?php 
            if($userdata['status']==0){
                  echo 'Not Voted';
                }
                else{
                  echo'Voted';
                }
            ?>    
            <br>
            <br>     
        </div>
    </body>
</html>


