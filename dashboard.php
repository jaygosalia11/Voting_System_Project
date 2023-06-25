<?php
    include("connect.php");
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupdata'];
    // if($userdata['status']==0){
    //   $status='Not Voted';
    // }
    // else{
    //   $status='Voted';
    // }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>َ User Dashboard</title>
  <link rel="stylesheet" href="styledashboard.css">
</head>
<body>
    <div class="hello">
       <h1> Welome To Your Dashboard</h1>
    </div>
    <br>
    <button  class= "profile1" name="details"><a href="personaldetails.php">View Personal Details</a></button>
    <br><br>
    <div id="vote_dashboard">
                    <?php

                    if(isset($_SESSION['groupdata'])){
                        $groupdata = $_SESSION['groupdata'];
                        for($i=0; $i<count($groupdata); $i++){
                            ?>
                                <div class = "party_section">
                                <img style="float: left" src="uploadedimage/<?php echo $groupdata[$i]['image']?>" height="120" width="120">
                                <div class="party_name">
                                Party Name: <?php echo $groupdata[$i]['first_name'] ?>
                                </div>
                                <br><br><br>
                                <!-- <b>Votes :</b> <?php echo $groupdata[$i]['votes']?><br><br> -->
                                <form method="POST" action="vote.php">
                                <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes'] ?>">
                                <input type="hidden" name = "gid" value="<?php echo $groupdata[$i]['id'] ?>">
                              
                                <?php
                                    if($_SESSION['userdata']['status']==0){
                                        ?>
                                        <button type="submit" class="vote_btn">Vote</button><br>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button disabled type="button" name="votebtn" value="vote" class="vote_btn">Voted</button>
                                        <br>
                                        <br>
                                        <?php
                                    }
                                ?>
        
                                </form>
                                </div>
                                <br>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <b>No groups available right now.</b>    
                            </div>
                        <?php
                    }  
                    ?>
                </div>
</body>
</html>