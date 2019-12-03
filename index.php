<?php
class Index { // 2 точки входа - index.php и admin.php  - подключают одинаковые файлы, но разные классы в файле route.php
public static function indexFunction() {
  global $actions;
if ($actions == 'admin') {
  require_once("admin.php");
  exit();
}
else if ($actions == '' || $actions == 'goods') {
  Routem::addRoutem();
}
else{
   CallError::CallErrors();
}
}
}
require_once("config/config.php");
Index::indexFunction();



ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "public часть";
?>
