<?php
// DIRECTORY_SEPARATOR 會根據不同系統判斷 / \
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
// 定義 root 目錄
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'WinNMP' . DS . 'WWW' . DS . 'RESTful');
// 定義 includes 目錄
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes');
// 定義 core 目錄
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT . DS . 'core');

require_once(INC_PATH . DS . 'config.php');
require_once(CORE_PATH . DS . 'post.php');
require_once(CORE_PATH . DS . 'category.php');
