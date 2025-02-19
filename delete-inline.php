<?php
include 'database_connect.php';
global $db;


$sql = "DELETE FROM student_info WHERE id = '$_GET[id]'";

$result = mysqli_query($db, $sql) or die("Query Error");
mysqli_close($db);
header("location:index.php");