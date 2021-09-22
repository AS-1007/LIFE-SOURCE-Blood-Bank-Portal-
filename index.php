<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->authLogin(); 

$message=NULL;
if(isset($_POST['loginBtn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $flag = $db->login($email, $password);
    if($flag){
        header("Location: http://localhost/LifeSource/home.php");
    } else {
        $message = "email or password is incorrect!";
    }
}
$title="Login";
include 'layout/_header.php'; 
?>

<div class="container"id="i1">
<div class="row">
    <div class="col-lg-6 col-md-6">
        <?php if(isset($message)): ?>
        <div class="alert-danger"><?= $message; ?></div>
        <?php endif; ?>
        <div class="panel panel-default"id="panel1">
            <div class="panel-heading">
                <div class="col-md-6">
                    <img src="assets/download (1).png" class="img img-responsive img-thumbnail ">
                </div>
                <h5> USER LOGIN</h5>
            </div>
            <div class="panel-body">
                <form class="form-vertical" role="form" method="post" action="index.php">
                    <div class="form-group">
                        <input type="text" class="form-control" required="true" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" required="true" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group loginBtn">
                        <button type="submit" name="loginBtn" class="btn btn-warning btn-sm">Login</button>
                        <a href="users/" class="btn btn-sm btn-warning">Do not have Account</a>
                    </div>
                </form>
            </div>
			</div>
        </div>
    </div>
    <div>
    <div class="col-lg-6 col-md-6">
        <img src="assets/left-index-logo.jpg" class="img img-responsive">
    </div>
    
</div>

<?php include 'layout/_footer.php'; ?>

