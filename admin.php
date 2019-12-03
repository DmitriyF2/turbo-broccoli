<?php
class Admin {
public static function adminFunction() {
  global $actions;
if ($actions == 'admin') {
  Router::addRouter();

}
else if ($actions == '' || $actions == 'goods') {
  require_once("index.php");
  exit();
}



}
}
require_once("config/config.php");
Admin::adminFunction();



ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "admin часть";
?>
