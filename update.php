<?php

include 'header.php';
include 'database_connect.php';
global $db;

$sid = $_POST['sid'] ?? '';

$sql = "SELECT * FROM student_info WHERE id = '$sid'";

$result = mysqli_query($db, $sql) or die("Mysql query error");

?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid"/>
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show"/>
    </form>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form class="post-form" action="updatedata.php" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="hidden" name="sid" value="<?php echo $row['id']; ?>"/>
                    <input type="text" name="sname" value="<?php echo $row['name']; ?>"/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="saddress" value="<?php echo $row['address']; ?>"/>
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <select name="sclass">
                        <?php
                        $sql_2 = "SELECT * FROM student_class";
                        $result_2 = mysqli_query($db, $sql_2);
                        while ($row_2 = mysqli_fetch_assoc($result_2)) {
                            if($row_2['class_id'] == $row['class']){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $row_2['class_id']; ?>"><?php echo $row_2['class_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="sphone" value="<?php echo $row['phone']; ?>"/>
                </div>
                <input class="submit" type="submit" value="Update"/>
            </form>
            <?php
        }
    }
    mysqli_close($db);
    ?>
</div>
</div>
</body>
</html>
