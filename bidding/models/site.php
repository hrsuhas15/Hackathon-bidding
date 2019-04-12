<?php
  class Site
  {
    // DB Stuff
    private $conn;
    private $table = 'SITE';

    // Properties
    public $siteId;
    public $price;
    public $address;
    public $lat;
    public $lng;
    public $mobile;
    public $bidDate;

    // Constructor with DB
    public function __construct($db)
    {
      $this->conn = $db;
    }

    // Get categories
    public function read()
    { $query = "SELECT * FROM SITE";
      //Prepare statement
      $stmt = $this->conn->prepare($query);
      // Execute query
      $stmt->execute();
      $result = $stmt;
      $num = $result->rowCount();
      // Check if any posts
      if($num > 0)
      {
        // Post array
        $posts_arr = array();
        //$posts_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
          extract($row);
          //echo"hello";
          $post_item = array('siteId' => $siteId,'price' => $price,'address' => $address,'lat'=>$lat,'lng'=>$lng,'bidDate' =>$bidDate);
          // Push to "data"
          array_push($posts_arr, $post_item);
          // array_push($posts_arr['data'], $post_item);
        }
       }
       return $posts_arr;
     }

     // public function readname()
     // {
     //   $query = "SELECT name,categoryId FROM CATEGORY";
     //   //Prepare statement
     //   $stmt = $this->conn->prepare($query);
     //   // Execute query
     //   $stmt->execute();
     //   $result = $stmt;
     //   $num = $result->rowCount();
     //   // Check if any posts
     //   if($num > 0)
     //   {
     //     // Post array
     //     $posts_arr = array();
     //     //$posts_arr['data'] = array();
     //     while($row = $result->fetch(PDO::FETCH_ASSOC))
     //     {
     //       extract($row);
     //       //echo"hello";
     //       $post_item = array('categoryId'=>$categoryId,'name' => $name);
     //       // Push to "data"
     //       array_push($posts_arr, $post_item);
     //       // array_push($posts_arr['data'], $post_item);
     //     }
     //    }
     //    return $posts_arr;
     //  }
     // Get Single Post
     public function read_single()
     {
          if($this->norowcheck()) return false;
          // Create query
          $query = "SELECT * FROM SITE WHERE siteId = ?";
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Bind ID
          $stmt->bindParam(1, $this->siteId);
          // Execute query
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          // Set properties
          return array(
          'siteId' => $row['siteId'],
          'address' => $row['address'],
          'details' => $row['details'],
          'bidDate' => $row['bidDate'],
          'price' => $row['price'],
          'mobile' => $row['mobile'],
          );
    }

    public function  norowcheck()
    {
          // Create query
          $query = "SELECT * FROM SITE WHERE categoryId = ?";
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
    public function create()
    {
          $query="insert into SITE(mobile,lat,lng,bidDate,price,address,details) values('$this->mobile','$this->lat','$this->lng','$this->bidDate','$this->price','$this->address','$this->details')";
          $stmt=$this->conn->prepare($query);
          if($stmt->execute())
          {
            return true;
          }
          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);
          return false;
     }
    //
    // public function update()
    // {
    //         if($this->norowcheck()) return false;
    //         $query = "UPDATE CATEGORY
    //                   SET name = '$this->name', details = '$this->details'
    //                   WHERE categoryId = '$this->categoryId'";
    //         // Prepare statement
    //         $stmt = $this->conn->prepare($query);
    //         // Execute query
    //         if($stmt->execute())
    //         {
    //           return true;
    //         }
    //         // Print error if something goes wrong
    //         printf("Error: %s.\n", $stmt->error);
    //         return false;
    // }
    //
    // public function delete()
    // {
    //         if($this->norowcheck()) return false;
    //         $query = "DELETE FROM CATEGORY
    //                   WHERE categoryId = '$this->categoryId'";
    //         // Prepare statement
    //         $stmt = $this->conn->prepare($query);
    //         // Execute query
    //
    //         if($stmt->execute())
    //         {
    //           return true;
    //         }
    //         // Print error if something goes wrong
    //         printf("Error: %s.\n", $stmt->error);
    //         return false;
    // }
  }
?>
