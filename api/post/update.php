<?php
header('Access_Control_Allow_Origin: *');
header('Access_Control_Allow_Methods: PUT');
header('Access_Control_Allow_Headers: Access_Control_Allow_Headers, Content_Type, Access_Control_Allow_Methods, Authorization, X-Requested-With');
header('Content-Type: application/json');
include_once '../../core/initialize.php';

$post = new Post($db);
$data = json_decode(file_get_contents("php://input"));
// Todo 要確認送進來的資料正確性
$post->id = $data->id;
$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;
if ($post->update()) {
  echo json_encode(array('message' => '更新成功'), JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode(array('message' => '更新失敗'), JSON_UNESCAPED_UNICODE);
}