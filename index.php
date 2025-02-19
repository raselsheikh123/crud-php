<?php
global $db;
include 'header.php';
include 'database_connect.php';


$sql = "SELECT * FROM student_info JOIN student_class WHERE student_info.class = student_class.class_id";

$result = mysqli_query($db, $sql) or die("Query Error");

?>
<div id="main-content">
    <h2>All Records</h2>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                        <a href='delete-inline.php?id=<?php echo $row['id']; ?>'>Delete</a>
                    </td>
                </tr>
                <?php
            }
        }else{
            echo "0 results";
        }
        mysqli_close($db);
        ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
