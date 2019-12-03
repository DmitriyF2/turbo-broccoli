<?php
/* class c {
  public $globvar2 = array(4, 3);

}
$f = new c();
$globvar2 = $f->globvar2;


class a {

    static public function b() {
       global $globvar2;

        return $globvar2;
    }
} */

$router = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  $actions = $router[1];


class Routem {
  public static function addRoutem() {

    $controllerName = "defaultController";
    $modelName = "defaultModel";
    $action = "default";
    $route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  $i = count($route)-1;
    while($i > 0) {
      if($route[$i] != '') {


        if(is_file(CONTROLLERS. ucfirst($route[$i]) . "Controller.php") && !is_numeric($route[$i])){   //на четвертом контроллер не нужен, выполняется обработка только чисел для пагинации
          $controllerName = ucfirst($route[$i]) . "Controller";
            $modelName = ucfirst($route[$i]). "Model";
break;
} else if (!is_numeric($route[$i])){

  $action = $route[$i];



  break;
}
else {
  $action = "default";

}

}

$i--;
}
//    if($route[$i] == 0) {
//      $action = 'goods';
//    }
    require_once CONTROLLERS . $controllerName . ".php";
    require_once MODELS . $modelName . ".php";

    $controller = new $controllerName();
    $controller->$action();
  }
  public function errorPage() {

  }
}






class Router {
  public static function addRouter() {
    $controllerName = "adminController";
    $modelName = "adminModel";
    $action = "admin";
    $route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  //  $site = explode("/", parse_url($_SERVER['REQUEST_URI']));
    $i = count($route)-1;
    while($i > 0) {
      if($route[$i] != '') {

        if(is_file(CONTROLLERS. ucfirst($route[$i]) . "Controller.php") && !is_numeric($route[$i]) && $i !== 6){   //на четвертом контроллер не нужен, выполняется обработка только чисел для пагинации
          $controllerName = ucfirst($route[$i]) . "Controller";
            $modelName = ucfirst($route[$i]). "Model";
//print_r($site);
//print_r($i);

break;

        } else if (!is_numeric($route[$i])) {




    /**      if ($route[1] !== "admin" || $route[2] !== "page") {
      *       CallError::CallErrors();
      *    } */

          $action = "admin";

          break;
        } else {
  $action = 'default';

}

}


      $i--;

    }

    require_once CONTROLLERS . $controllerName . ".php";
    require_once MODELS . $modelName . ".php";
    $controller = new $controllerName();
    $controller->$action();
  }
}

/**
 *
 */
class Error_s {

    public static function Errors() {
      require_once ("models/Model.php");
    require_once ("models/AdminModel.php");
    require_once ("config/db.php");
    $hn = new AdminModel();
    $hz = $hn->pagesNumber();

         if ((!is_numeric (adminModel::category_id())) || ((adminModel::category_id())>($hz))) {
        CallError::CallErrors();

}
}
}

class Error_public {

public static function Errors_public() {
  require_once ("models/Model.php");
require_once ("models/DefaultModel.php");
require_once ("config/db.php");
  $hn = new defaultModel();
  $hz = $hn->pagesCatNumberRout();
  $hg = $hn->pagesNumber();
//  print_r(defaultModel::category_id());
  if ((!is_numeric (defaultModel::category_id())) || (!is_numeric (defaultModel::pageg())) || ((defaultModel::pageCategory_Selected())>($hg)) || ((defaultModel::category_id())>($hz)) || ((defaultModel::pageg())>($hg))) {
//print_r((defaultModel::category_id()));
    CallError::CallErrors();

  }
}
}
class CallError {
  public static function CallErrors() {
    http_response_code(404);
    include('my_404.php');
    die();
  }
}
if ($actions == 'admin') {
Error_s::Errors();
}
if ($actions == '' || $actions == 'goods') {
Error_public::Errors_public();
}




?>
