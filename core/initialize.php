<?php
// 定義根目錄
defined("ROOT_PATH") ? null : define("ROOT_PATH", realpath(__DIR__ . "/.."));

// 定義 includes 目錄
defined("INC_PATH") ? null : define("INC_PATH", ROOT_PATH . "/includes");

// 定義 core 目錄
defined("CORE_PATH") ? null : define("CORE_PATH", ROOT_PATH . "/core");

require_once(INC_PATH . "/config.php");
require_once(CORE_PATH . "/post.php");
require_once(CORE_PATH . "/category.php");