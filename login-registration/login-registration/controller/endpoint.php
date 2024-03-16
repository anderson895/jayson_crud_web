<?php 

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


include "../config/connection.php";


$functionName=$_POST['functionName'];


if($functionName=="LoginFunction"){


    session_start();

    $txtEmail=$_POST['txtEmail'];
    $txtPassword=$_POST['txtPassword'];

    $check_email = mysqli_query($link,"SELECT * from user WHERE email='$txtEmail'");
    $check_email_row = mysqli_num_rows ($check_email);
    
    if($check_email_row  > 0){
        $row = mysqli_fetch_assoc($check_email);
        $user_id  = $row["user_id"];
        $db_password = $row["password"];
        if($txtPassword==$db_password){

        $_SESSION["user_id"]=$user_id; 
         echo "Login successful";
        }else{
            echo "password incorrect";
        }
    }else{
        
        echo "email not registered";
    }

}else if($functionName=="SignupFunction"){

    echo "Perform Singup";
    

    $S_firstname=$_POST['S_firstname'];
    $L_firstname=$_POST['L_firstname'];
    $S_email=$_POST['S_email'];
    $S_password=$_POST['S_password'];

    // Attempt insert query execution
        $sql = "INSERT INTO user (fname, lname, email, password) VALUES ('$S_firstname', '$L_firstname', '$S_email','$S_password')";
        if(mysqli_query($link, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

}
?>

