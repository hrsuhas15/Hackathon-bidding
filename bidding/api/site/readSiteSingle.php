<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
   //echo "s";
  include_once '../../config/database.php';
  // echo "se";
  include_once '../../models/category.php';

  $database = new Database();
  $db = $database->connect();
  // Instantiate blog post object
  $cat = new Category($db);
  // Get ID
  if(isset($_POST['readsingle']))
  {
   $cat->siteId = $_POST['siteId'];
  }
  // Get post
  if($post_arr = $cat->read_single())
  {
   echo json_encode($post_arr);
  }
  else
  {
   echo json_encode(array('message' => 'No Site Found'));
  }
  ?>
