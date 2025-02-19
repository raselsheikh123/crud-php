<?php
global $db;
include 'database_connect.php';

$student_name = $_POST['sname'];
$student_address = $_POST['saddress'];
$student_class = $_POST['class'];
$student_phone = $_POST['sphone'];

$sql = "INSERT INTO student_info (name, address, class, phone) VALUES ('$student_name', '$student_address', '$student_class', '$student_phone')";

$result = mysqli_query($db, $sql) or die(mysqli_error($db));

mysqli_close($db);
header("location:index.php");

