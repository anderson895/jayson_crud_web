<?php
$conn = mysqli_connect("localhost", "root", "", "user_management");
if ($conn) {
    echo "Connected ";
} else {
    echo "Failed";
}

if(isset($_POST["usernameoremail"]) && isset($_POST["password"])) {
    $username = $_POST["usernameoremail"];
    $password = $_POST["password"];

    $data = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    $check = mysqli_query($conn, $data);

    if ($check) {
        echo "Data sent";
    } else {
        echo "Data not sent";
    }
} else {
    echo "Form fields are not set";
}

mysqli_close($conn);
?>
