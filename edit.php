<?php
global $db;
include 'header.php';
include 'database_connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM student_info WHERE id = '$id'";
$result = mysqli_query($db, $sql) or die("Query Error");

?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form class="post-form" action="updatedata.php" method="post">
                <div class="form-group">
                    <label>Name</label>
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
                        $sql2 = "SELECT * FROM student_class";
                        $query = mysqli_query($db, $sql2) or die("Query 2 Error");
                        if (mysqli_num_rows($query) > 0) {
                            while ($class_row = mysqli_fetch_assoc($query)) {
                                if($row['class'] == $class_row['class_id']){
                                    $selected = "selected";
                                }else{
                                    $selected = "";
                                }
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $class_row['class_id']; ?>"><?php echo $class_row['class_name']; ?></option>
                                <?php
                            }
                        }
                        ?>
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
