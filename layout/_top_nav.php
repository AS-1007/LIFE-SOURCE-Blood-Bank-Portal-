<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Life Source </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar">
    <div class="navbar-nav ">
      <?php
      if(isset($setHomeActive)){
        echo $setHomeActive;
      }
      else{
        echo '';
      }?>
      <a class="nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
      <?php
      if (isset($setDonorActive)) {
        echo $setDonorActive;
      }
      else{
        echo '';
      }
      ?>
      <a class="nav-link" href="donor.php">New Donor</a>
      <?php
      if (isset($setMemberActive)) {
        echo $setMemberActive;
      }
      else{
        echo '';
      }
      ?>
      <a class="nav-link" href="members.php">Our Member</a>
      <a class="nav-link" href="logout.php">Logout</a>
      
      
    </div>
  </div>
</nav>