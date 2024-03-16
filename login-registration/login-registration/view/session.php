<?php

session_start();

if (isset($_SESSION["user_id"])) {

    include("../config/connection.php");
    $user_id = $_SESSION["user_id"];

    $get_record = mysqli_query($link, "SELECT * FROM user where user_id ='$user_id'");
    $row = mysqli_fetch_assoc($get_record);
    $db_fullname = $row["fname"] . " " . $row["lname"];



    function countAllUsers($link)
    {
        $count_query = mysqli_query($link, "SELECT COUNT(*) AS total_users FROM user");
        $count_result = mysqli_fetch_assoc($count_query);
        return $count_result['total_users'];
    }
    $total_users = countAllUsers($link);

    function countAllEmployee($link)
    {
        $count_query = mysqli_query($link, "SELECT COUNT(*) AS total_employees FROM employees");
        $count_result = mysqli_fetch_assoc($count_query);
        return $count_result['total_employees'];
    }
    $total_employee = countAllEmployee($link);

} else {

    echo "<script>window.location.href='../';</script>";
}

?>
