<?php
class outController extends Controller {

  public function __construct() {

  }

  public function default() {

  }

}
require_once("adminController.php");
require_once("models/adminModel.php");
$c = new adminController;
$c->out();
