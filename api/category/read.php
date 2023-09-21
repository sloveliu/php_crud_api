<?php
require_once("../header.php");
require_once("../../core/initialize.php");

$category = new Category($db);
$result = $category->read();
$num = $result->rowCount();
if ($num > 0) {
  $category_arr = array();
  $category_arr["data"] = array();
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $category_arr_item = array(
      "id" => $id,
      "name" => $name,
      "created_at" => $created_at
    );
    array_push($category_arr["data"], $category_arr_item);
  }
  echo json_encode($category_arr, JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode(array("message" => "找不到分類"), JSON_UNESCAPED_UNICODE);
}
