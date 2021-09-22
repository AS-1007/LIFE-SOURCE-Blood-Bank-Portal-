<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Life Source</a>
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
      <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      <?php
      if (isset($setAboutActive)) {
        echo $setAboutActive;
      }
      else{
        echo '';
      }
      ?>
      <a class="nav-link" href="about.php">About Us</a>
      <?php
      if (isset($setMemberActive)) {
        echo $setMemberActive;
      }
      else{
        echo '';
      }
      ?>
      <a class="nav-link" href="member.php">Our Member</a>
       <?php
      if (isset($setJoinUsActive)) {
        echo $setJoinUsActive;
      }
      else{
        echo '';
      }
      ?>
      <a class="nav-link" href="register.php">Join Us</a>
       <?php
      if (isset($setAvailabilityActive)) {
        echo $setAvailabilityActive;
      }
      else{
        echo '';
      }
      ?>
      <a class="nav-link" href="availability.php">Check Availability</a>
      <a class="nav-link" href="../index.php">User Login</a>
      
      
    </div>
  </div>
</nav>