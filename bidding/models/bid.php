<?php
  class Admin
  {
    // DB Stuff
    private $conn;
    private $table = 'ADMIN';

    // Properties
    public $categoryId;
    public $adminId;
    public $adminName;
    public $mobile;
    public $password;

    // Constructor with DB
    public function __construct($db)
    {
      $this->conn = $db;
    }
    public function  norowcheck()
    {
          // Create query
          $query = "SELECT * FROM ADMIN WHERE categoryId = ?";
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Bind ID
          $stmt->bindParam(1, $this->categoryId);
          // Execute query
          $stmt->execute();
          $num=$stmt->rowCount();
        //  echo $num;
          if($num==0)
           return true;
          else
           return false;

    }
    public function getAdminId()
    {
         if($this->norowcheck()) return 0;
         // Create query
         $query = "SELECT * FROM ADMIN WHERE categoryId = ?";
         // Prepare statement
         $stmt = $this->conn->prepare($query);
         // Bind ID
         $stmt->bindParam(1, $this->categoryId);
         // Execute query
         $stmt->execute();
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         // Set properties
         echo $row['adminId'];
         return $row['adminId'];
    }
    public function create()
    {
          $query="insert into CATEGORY(name,details) values('$this->name','$this->details')";
          $stmt=$this->conn->prepare($query);
          if($stmt->execute())
          {
            return true;
          }
          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);
          return false;
     }
  }
?>
