<?php


$student_id = $_POST['sid'];
$student_name = $_POST['sname'];
$student_address = $_POST['saddress'];
$student_class = $_POST['sclass'];
$student_phone = $_POST['sphone'];

global $db;
include 'database_connect.php';

$sql = "UPDATE student_info SET name = '{$student_name}', address = '{$student_address}', class = '{$student_class}', phone = '{$student_phone}' WHERE id = {$student_id}";

$result = mysqli_query($db, $sql) or die(mysqli_error($db));

mysqli_close($db);
header("location:index.php");

