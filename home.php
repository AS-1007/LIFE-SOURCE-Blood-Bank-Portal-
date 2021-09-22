<?php
$i = 0;
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

if (isset($_POST['searchBtn'])) {
    $bloodGroup = $_POST['blood_group'];
    $donors = $db->searchDonorWithBloodGroup($bloodGroup);
}

if (isset($_POST['searchByCityBtn'])) {
    $city = $_POST['city'];
    $donors = $db->searchDonorByCity($city);
}
$title = "Home";
$setHomeActive = "";
include 'layout/_header.php';

include 'layout/_top_nav.php';
?>
<div class="container"style="background-image: url('assets/download (1).jpg');background-size: cover;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                <form class="form-horizontal" method="post" action="home.php">
                    <div class="form-group">
                        <label class="col-lg-10 col-md-9 col-sm-6"style="color: white;font-size: 32px;">Search for donor with blood group </label>
                        <div class="col-lg-10 col-md-9 col-sm-4">
                            <select name="blood_group" class="form-control">
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-2">
                            <button class="btn btn-info btn-sm" name="searchBtn"style="padding-top: 10px;padding-bottom: 10px;padding-left: 30px;padding-right: 30px;margin-top: 20px;" >Search</button>
                        </div>
                    </div>

                </form>
                <form class="form-horizontal" method="post" action="home.php">
                    <div class="form-group">
                        <label class="col-lg-10 col-md-9 col-sm-6"style="color: white;font-size: 32px;">Search for donor by city </label>
                        <div class="col-lg-10 col-md-9 col-sm-4">
                            <input type="text" name="city" value="" required="true" class="form-control"/>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-2">
                            <button class="btn btn-info btn-sm" name="searchByCityBtn"style="padding-top: 10px;padding-bottom: 10px;padding-left: 30px;padding-right: 30px;margin-top: 20px;" >Search</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
    <div class="row">
        <div class="col-md-1">         
        </div>
        <div class="col-md-10">
            
            <?php if(isset($_POST['searchBtn'])): ?>
                <?php if(isset($donors[0])): ?>
                    <label>Total Blood Units Available for <?= $donors[0]['b_type']; ?>:</label> <span class="emphasize"><?= count($donors); ?> Unit</span>
                <?php endif; ?>
            <?php endif; ?>
            
            
            <?php if(isset($_POST['searchByCityBtn'])): ?>
                <?php if(isset($donors[0])): ?>
                    <label>Total Number of Donors in this City:</label> <span class="emphasize"><?= count($donors); ?></span>
                <?php endif; ?>
            <?php endif; ?>
            
            <!-- if result has been fetched succesffully -->
            <?php if (isset($donors)): ?>
                <table class="table table-condensed">
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Mobile</th>
                        <th>Phone</th>
                        <th>Blood Group</th>
                    <tr>
                        <?php foreach ($donors as $d): $i++; ?>
                        <tr class="<?php
                        if ($i % 2 == 0) {
                            echo "bg-danger";
                        } else {
                            echo "bg-success";
                        }
                        ?>" >
                            <td><?= $i; ?></td>
                            <td><a href="profile.php?id=<?= $d['id']; ?>"><?= $d['fname'] . " " . $d['mname'] . " " . $d['lname']; ?></a></td>
                            <td><?= $d['sex']; ?></td>
                            <td><?= wordwrap($d['h_address'], 20, "<br>"); ?></td>
                            <td><?= $d['city']; ?></td>
                            <td><?= $d['mobile']; ?></td>
                            <td><?= $d['phone']; ?></td>
                            <td><?= $d['b_type']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
        <div class="col-md-1"></div>
    </div>

<?php include 'layout/_footer.php'; ?>