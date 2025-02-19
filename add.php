<?php
global $db;
include 'header.php';
include 'database_connect.php';

$sql = "SELECT * FROM student_class";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname"/>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress"/>
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone"/>
        </div>
        <input class="submit" type="submit" value="Save"/>

    </form>
</div>
<?php mysqli_close($db); ?>
</div>
</body>
</html>
