<?php
    session_start();
    include("connect.php");
if(isset($_POST["loginform"])){
    if(empty($_POST["email"]) || empty($_POST["password"])){
        echo '<script>
                alert("Invalid credentials!");
            </script>';
    }else{
        
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
  


    $check = mysqli_query($connect, "SELECT * FROM form_register WHERE email='$email' and password='$password' and role='$role' ");

    if(mysqli_num_rows($check)>0){
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect, "SELECT * FROM form_register WHERE  role=2");
        $groupdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);
        $_SESSION['groupdata'] = $groupdata;
        $_SESSION['userdata'] = $userdata;



        echo '<script>
                alert("welcome to online voting system your credentials has been found");

                window.location = "dashboard.php";
            </script>';
    }

    

    else{
        echo '<script>
                alert("Invalid credentials!");
            </script>';
    }
    }
  
}
  
?>