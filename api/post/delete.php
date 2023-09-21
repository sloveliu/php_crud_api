<?php
header("Access_Control_Allow_Methods: DELETE");
header("Access_Control_Allow_Headers: Access_Control_Allow_Headers, Content_Type, Access_Control_Allow_Methods, Authorization, X-Requested-With");
require_once("../header.php");
require_once("../../core/initialize.php");

$post = new Post($db);
$data = json_decode(file_get_contents("php://input"));
if (isset($data->id)) {
  $post->id = $data->id;
  if ($post->delete()) {
    echo json_encode(array("message" => "刪除成功"), JSON_UNESCAPED_UNICODE);
  } else {
    echo json_encode(array("message" => "刪除失敗"), JSON_UNESCAPED_UNICODE);
  }
} else {
  echo json_encode(array("message" => "缺少必要的參數"), JSON_UNESCAPED_UNICODE);
}
