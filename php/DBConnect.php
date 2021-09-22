
<?php
class DBConnect {
    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "lifesource";

    public function __construct() {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $u) {
            throw new Exception('Connection failed: ' .
            $u->getMessage());
        }
        return $this->db;
    }
    
    public function auth(){
        session_start();
        if(! isset($_SESSION['email'])){
            header("Location: http://localhost/LifeSource");
        }       
    }
    public function authLogin(){
       session_start();
        if(isset($_SESSION['email'])){
            header("Location: http://localhost/LifeSource/home.php");
        }
    }
    
    public function checkAuth(){
       session_start();
        if(! isset($_SESSION['email'])){
            return false;
        } else {
            return true;
        }
    }


    public function login($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=? AND password=?");
        $stmt->execute([$email,$password]);
        if($stmt->rowCount() > 0){
           session_start();
            $users = $stmt->fetchAll();
            foreach($users as $u){
               
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['firstName'] = $u['f_name'];
                
                $_SESSION['lastName'] = $u['l_name'];
                $_SESSION['birthDay'] = $u['dob'];
                $_SESSION['gender'] = $u['gender'];
                $_SESSION['Blood Group'] = $u['b_type'];
                $_SESSION['address'] = $u['address'];
                $_SESSION['city'] = $u['city'];
                $_SESSION['mobile'] = $u['mobile'];
                $_SESSION['created_at'] = $u['created_at'];
                
            }
            
            return true;
        } else {
            return false;
        }
    }
    
    public function addDonor($fname,$mname,$lname,$sex,$bType,$dob,$hAddress,$city,$donationDate,$stats,$temp,
            $pulse,$bp,$weight,$hemoglobin,$hbsag,$aids,$malariaSmear,$hematocrit,$mobile,$phone){
        $stmt = $this->db->prepare("INSERT INTO donors (fname,mname,lname,sex,b_type,bday,h_address,city,don_date,stats,temp,pulse,bp,weight,"
                . "hemoglobin,hbsag,aids,malaria_smear,hematocrit,mobile,phone)"
                . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$fname,$mname,$lname,$sex,$bType,$dob,$hAddress,$city,$donationDate,$stats,$temp,$pulse,$bp,$weight,
            $hemoglobin,$hbsag,$aids,$malariaSmear,$hematocrit,$mobile,$phone]);
        return true;
        
    }
    
    public function searchDonorWithBloodGroup($bloodGroup){
        $stmt = $this->db->prepare("SELECT * FROM donors WHERE b_type LIKE ?");
        $stmt->execute([$bloodGroup]);
        return $stmt->fetchAll();
    }
    
    public function searchDonorByCity($city){
        $stmt = $this->db->prepare("SELECT * FROM donors WHERE city LIKE ?");
        $stmt->execute(["%".$city."%"]);
        return $stmt->fetchAll();
    }
    
    public function logout(){
        session_start();
        session_destroy();
        header("Location: http://localhost/LifeSource/");
    }
    
    public function getDonorProfileById($id){
        $stmt = $this->db->prepare("SELECT * FROM donors WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    
}
