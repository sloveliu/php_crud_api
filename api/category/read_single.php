<?php
require_once("../header.php");
require_once('../../core/initialize.php');

$category = new Category($db);
$category->id = isset($_GET['id']) ? $_GET['id'] : die();
$category->read_single();
$post_arr = array(
  'id' => $category->id,
  'name' => $category->name,
  'created_at' => $category->created_at,
);
print_r(json_encode($post_arr));
