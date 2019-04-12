<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  // echo "s";
  include_once '../../config/database.php';
  // echo "se";
  include_once '../../models/site.php';
  // Instantiate DB & connect
  $database = new database();
  $db = $database->connect();
  // Instantiate blog cat object
  $cat = new Site($db);
  //Get raw posted data
  //$data = json_decode(file_get_contents("php://input"));
  //$data = json_decode($_POST['data'],true);
   if(isset($_POST['create']))
   {
    $cat->mobile=9148525140;
    $cat->address=$_POST['address'];
    $cat->lng=$_POST['lng'];
    $cat->lat=$_POST['lat'];
    $cat->price=$_POST['price'];
    $cat->bidDate=$_POST['bidDate'];
   }
  //$cat->categoryId = $data->categoryId;
  //echo $data;
  //$cat->name = $data['name'];
  //$cat->details = $data['details'];
  //$post->category_id = $data->category_id;
  // Create post
  if($cat->create())
  {
    echo json_encode(array('message' => 'Site Created'));
  }
  else
  {
    echo json_encode(array('message' => 'Site Not Created'));
  }
