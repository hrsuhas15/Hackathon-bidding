<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
   //echo "s";
  include_once '../../config/database.php';
    echo "se";
  include_once '../../models/user.php';
    echo "s";
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
   echo "suhas";
  // Instantiate blog cat object
  $usr = new User($db);
  //Get raw posted data
  //$data = json_decode(file_get_contents("php://input"));
  if(isset($_POST['login']))
  {
   $usr->mobile=$_POST['mobile'];
   $usr->password=md5($_POST['password']);

 }
  //$cat->categoryId = $data->categoryId;
  //$cat->name = $data->name;
  //$cat->details = $data->details;
  //$post->category_id = $data->category_id;
  echo "suhas";
  // Update post
  if($usr->login())
  {
    echo json_encode(array('message' => 'Valid'));
    header("Location: ../../user/index.php");
  }
  else
  {
    echo json_encode(array('message' => 'Invalid'));
  }
