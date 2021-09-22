<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$success = NULL;
$message = NULL;
if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $designation = $_POST['designation'];
    $landline = $_POST['landline'];
    $mobile = $_POST['mobile'];
   

    $flag = $db->addEmployee($username, $password, $firstName, $middleName, $lastName,$designation, $landline, $mobile, $dob);

    if ($flag) {
        $success = "Employee has been added to the database successfully!";
    } else {
        $message = "Error adding the employee to the database!". $flag;
    }
}
$title = "Admin Home";
$setHomeActive = "";
include_once 'layout/_header.php';
include_once 'layout/_top_nav.php';
?>

<div class="container"style="background-image:url('admin/assets/download.png');margin-top: 10px;">
    <div class="col-md-3"></div>
    <div class="col-md-9">

        <?php if (isset($success)): ?>
            <div class="alert-success"><?= $success; ?></div>
        <?php endif ?>
        <?php if (isset($message)): ?>
            <div class="alert-success"><?= $message; ?></div>
<?php endif ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Add Employee</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="home.php">
                    <div class="form-group">
                        <label class="col-md-3 ">Name:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9"> <input type="text" name="firstName" class="form-control" placeholder="First Name" required="true"> </div>
                        <div class="col-lg-9 col-md-9 col-sm-9"><input type="text" name="middleName" class="form-control" placeholder="Middle Name"></div>
                        <div class="col-lg-9 col-md-9 col-sm-9"><input type="text" name="lastName" class="form-control" placeholder="Last Name" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Username:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9"><input type="text" name="username" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Password:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9"><input type="password" name="password" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Date of Birth:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9"><input type="date" name="dob" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Designation:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9"><input type="text" name="designation" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Landline:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9"><input type="number" min="0" max="10000000000" name="landline" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Mobile:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9"><input type="number" min="0" max="10000000000" name="mobile" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <button type="submit" class="btn btn-success btn-md" name="submit">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

<?php include 'layout/_footer.php'; ?>