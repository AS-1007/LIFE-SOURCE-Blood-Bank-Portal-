<?php 
// Include the database configuration file  
    $DB_SERVER = "localhost";
     $DB_USER = "root";
     $DB_PASSWORD = "";
     $DB_NAME = "lifesource";
 $db = new mysqli($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);  
  
// Check connection  
  if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
   } 
 
// Get image data from database 
$result = $db->query("SELECT image FROM images ORDER BY uploaded DESC"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>