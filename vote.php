<?php
    session_start();
    include("connect.php");

    $votes = $_POST['gvotes'];
    $total_votes= $votes+1;
    $gid = $_POST['gid'];
    $uid = $_SESSION['userdata']['id'];

    $update_votes = mysqli_query($connect, "UPDATE form_register SET votes='$total_votes' WHERE id='$gid'");
    $update_status = mysqli_query($connect, "UPDATE form_register SET status=1 WHERE id='$uid'");

    if($update_status and $update_votes){
        $group = mysqli_query($connect, "SELECT  first_name, image, votes, id FROM form_register where role=2 ");
        $groupdata = mysqli_fetch_all($group, MYSQLI_ASSOC);
        $_SESSION['groupdata'] = $groupdata;
        $_SESSION['userdata']['status'] = 1;
        echo '<script>
                    alert("Voting successfull!");
                    window.location = "dashboard.php";
                </script>';
    }
    else{
        echo '<script>
                    alert("Voting failed!.. Try again.");
                    window.location = "dashboard.php";
                </script>';
    }
    
?>