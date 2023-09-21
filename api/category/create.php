<?php
header('Access_Control_Allow_Methods: PUT');
header('Access_Control_Allow_Headers: Access_Control_Allow_Headers, Content_Type, Access_Control_Allow_Methods, Authorization, X-Requested-With');
require_once("../header.php");
require_once('../../core/initialize.php');

$category = new Category($db);

$data = json_decode(file_get_contents("php://input"));
// Todo 要確認送進來的資料正確
$category->name = $data->name;

if ($category->create()) {
  echo json_encode(array('message' => '新增成功'), JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode(array('message' => '新增失敗'), JSON_UNESCAPED_UNICODE);
}
