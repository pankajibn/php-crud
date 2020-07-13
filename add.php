<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
    $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
    $course = (!empty($_POST['course'])) ? $_POST['course'] : '';
    $id = (!empty($_POST['student_id'])) ? $_POST['student_id'] : '';

    if (!empty($id)) {
        // update the record
        $stu_query = "UPDATE `students` SET first_name='" . $first_name . "', last_name='" . $last_name . "',gender='" . $gender . "',email= '" . $email . "', course='" . $course . "' WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "INSERT INTO `students` (first_name, last_name, gender,email, course) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $gender . "', '" . $email . "', '" . $course . "' )";
        $msg = "add";
    }

    $result = mysqli_query($conn, $stu_query);

    if ($result) {
        header('location:/crud/index.php?msg=' . $msg);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {
    // require the db connection
    require_once 'includes/db.php';

    $stu_id = $_GET['id'];
    $stu_query = "SELECT * FROM `students` WHERE id='" . $stu_id . "'";
    $stu_res = mysqli_query($conn, $stu_query);
    $results = mysqli_fetch_row($stu_res);
    $first_name = $results[1];
    $last_name = $results[2];
    $gender = $results[3];
    $email = $results[4];
    $course = $results[5];

} else {
    $first_name = "";
    $last_name = "";
    $gender = "";
    $email = "";
    $course = "";
    $stu_id = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body>
   <?php include 'partial/nav.php';?>

    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-7">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-7">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-7">
                <select class="form-control" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="Male" <?php if ($gender == 'Male') {echo "selected";}?> >Male</option>
                <option value="Female" <?php if ($gender == 'Female') {echo "selected";}?>>Female</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
            <label for="course" class="col-sm-3 col-form-label">Course</label>
            <div class="col-sm-7">
                <select class="form-control" name="course" id="course">
                <option value="">Select Course</option>
                <option value="BCA" <?php if ($course == 'BCA') {echo "selected";}?>>BCA</option>
                <option value="MCA" <?php if ($course == 'MCA') {echo "selected";}?>>MCA</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-7">
                <input type="hidden" name="student_id" value="<?php echo $stu_id; ?>">
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>