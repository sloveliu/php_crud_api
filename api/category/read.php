<?php
header('Access_Control_Allow_Origin: *');
header('Content-Type: application/json');
include_once '../../core/initialize.php';

$category = new Category($db);
$result = $category->read();
$num = $result->rowCount();
if ($num > 0) {
  $post_arr = array();
  $post_arr['data'] = array();
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $post_item = array(
      'id' => $id,
      'name' => $name,
      'created_at' => $created_at
    );
    array_push($post_arr['data'], $post_item);
  }
  echo json_encode($post_arr, JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode(array('message' => '找不到分類'), JSON_UNESCAPED_UNICODE);
}
