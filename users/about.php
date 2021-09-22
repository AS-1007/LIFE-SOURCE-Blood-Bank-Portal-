<?php
$title="About Us";$setAboutActive="";
include 'layout/_header.php';

include 'layout/navbar.php';
?>


  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/anybodycangiveblood.jpg" class="d-block w-100"style="height:700px;">
      
      <div class="carousel-caption ">
        
        <h4 style="margin-bottom: 350px;"><i>Most people can give blood if they are in good health. There are some basic requirements one need to fulfill in order to become a blood donor.</i></h4>
      
        <button class="btn btn-success"><a href="register.php">Join Us</a></button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/youre-somebodys-type.jpg" class="img-fluid d-block w-100" style="height:700px;">
      <div class="carousel-caption d-none d-md-block">
       
        <h3> no matter what blood type you have someone will need it</h3>
      
      <button class="btn btn-success"><a href="availability.php">Search</a></button>
     </div>
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <a href="#" id="Heading">About Us</a>
            <h2><em>Welcome Life Source</em></h2>
            <p>We are a non-profitable organization which aims to provide a better and easier way to find the required blood needed
            at the time. </p>
            <p>Our Aim is to provide transparency in this field, make the process of obtaining blood from a blood bank hassle-free and corruption-free and make the system of life source management effective.</p>
        </div>
    </div>
</div>

<?php include 'layout/_footer.php'; ?>

