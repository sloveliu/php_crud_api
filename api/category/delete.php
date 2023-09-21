<?php
header('Access_Control_Allow_Origin: *');
header('Access_Control_Allow_Methods: DELETE');
header('Access_Control_Allow_Headers: Access_Control_Allow_Headers, Content_Type, Access_Control_Allow_Methods, Authorization, X-Requested-With');
header('Content-Type: application/json');
include_once '../../core/initialize.php';

$category = new Category($db);

$data = json_decode(file_get_contents("php://input"));
// Todo 要確認送進來的資料正確性
$category->id = $data->id;

if ($category->delete()) {
  echo json_encode(array('message' => '刪除成功'), JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode(array('message' => '刪除失敗'), JSON_UNESCAPED_UNICODE);
}
