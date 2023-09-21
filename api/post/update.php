<?php
header("Access_Control_Allow_Methods: PUT");
header("Access_Control_Allow_Headers: Access_Control_Allow_Headers, Content_Type, Access_Control_Allow_Methods, Authorization, X-Requested-With");
require_once("../header.php");
require_once("../../core/initialize.php");

$post = new Post($db);
$data = json_decode(file_get_contents("php://input"));
$required_fields = ["id", "title", "body", "author", "category_id"];
$is_valid = true;

foreach ($required_fields as $field) {
  if (!isset($data->$field)) {
    $is_valid = false;
    break;
  }
}

if ($isValid) {
  $post->id = $data->id;
  $post->title = $data->title;
  $post->body = $data->body;
  $post->author = $data->author;
  $post->category_id = $data->category_id;
  if ($post->update()) {
    echo json_encode(array("message" => "更新成功"), JSON_UNESCAPED_UNICODE);
  } else {
    echo json_encode(array("message" => "更新失敗"), JSON_UNESCAPED_UNICODE);
  }
} else {
  echo json_encode(array("message" => "缺少必要的參數"), JSON_UNESCAPED_UNICODE);
}
