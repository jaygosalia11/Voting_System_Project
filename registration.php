
<?php
    include("connect.php");
    //if(isset($_POST["registerform"]))

    $firstname = $_POST['fname'];
    $contactnumber = $_POST['contact'];
    $emailaddress = $_POST['email_1'];
    $homeaddress = $_POST['address'];
    $yourrole = $_POST['role'];
    $yourimage = $_FILES ["user_image"]['name'];
    $tempimage = $_FILES ["user_image"]['tmp_name'];
    $yournewpass = $_POST['newpassword'];
    $yourconfirmpass = $_POST['confirmpassword'];

 
    
    if($yournewpass!=$yourconfirmpass){
        echo '<script>
                alert("Sorry!Your Paasword Did Not Match!");
                window.location = "../registrationform.html";
             </script>';
    }
    else{
        move_uploaded_file($tempimage,"uploadedimage/". $yourimage);
        $insert = mysqli_query($connect, "INSERT INTO form_register (first_name, number, address, email, role, image, password, status, votes) VALUES ('$firstname', '$contactnumber', '$homeaddress','$emailaddress','$yourrole', '$yourimage', '$yournewpass', 0, 0)");

        if($insert)
        {
            echo '<script>
                    alert("You Have Successfullly Registered!");
                    window.location = "login.html";
                </script>';
        }
        else
        {
            echo '<script>
                    alert("Not Registered");
                    window.location = "registrationform.html";
                </script>';
        }

        }

?>