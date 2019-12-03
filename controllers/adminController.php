<?php
require_once("defaultController.php");
require_once("models/defaultModel.php");
class adminController extends Controller {
  private $pageTpl = "/views/admin.tpl.php";
  public function __construct() {
    $this->model = new adminModel();
    $this->view = new View();
    $this->pageData['title'] = "Администрирование";
      $tables = $this->model->tables();
      $this->pageData['tables'] = $tables;
      if(!$_SESSION['user']) {
        header("Location: /");
    }

}

public function pages() {

  $category = $this->model->category();
  $this->pageData['cat'] = $category;
return $category;

}








  public function admin() {



///////////////////////////////////////////////////////
$info = $this->model->GetInfo();
$this->pageData['info'] = $info;

$pagesAdmin = $this->model->pagesAdmin();
$this->pageData['admin'] = $pagesAdmin;

$pagesAdminSpecial = $this->model->pagesAdminSpecial();
$this->pageData['special'] = $pagesAdminSpecial;













/*if(isset($_POST['add'])){
  $name = $_POST['name'];
  $this->model->AddInfo($id, $name);

} */
/*$pagesCatNum = $this->model->pagesCatNumber();
$this->pageData['pagesCatNumber'] = $pagesCatNum;*/
////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////
    $this->pageData['error'] = "Привет, ". $_SESSION['user'];
$count = $this->model->account();
$this->pageData['count'] = $count;


$pagesNum = $this->model->pagesNumber();
$this->pageData['pagesNumber'] = $pagesNum;
/////////////////////////////////////////////////////
//$page = $this->model->pageg();
//$this->pageData['page'] = $page;
////////////////////////////////////////////////////////проверить

adminController::page();

//$a = new defaultController();


//$a->pagesAdminSpecial2 = '/admin';

//$a->default();





$pagesAdminSpecial = $this->model->pagesAdminSpecial();
$this->pageData['special'] = $pagesAdminSpecial;


//$this->view->render($this->pageTpl, $this->pageData);
}
public function page() {//////////////////////////////////////////////////////////////








  $pagesNum = $this->model->pagesNumber();
  $this->pageData['pagesNumber'] = $pagesNum;
  $page = $this->model->category_id();
  $this->pageData['cat_id'] = $page;


  $category = $this->model->category();
  $this->pageData['cat'] = $category;



  if(isset($_POST['update'])){
  $idB = $this->pages()[$_POST['id']]['idB'];
  $idGood = $this->pages()[$_POST['id']]['idG'];
  $idCat = $this->pages()[$_POST['id']]['idCat'];
  //  echo "string";print_r($idGood); print_r($idCat); print_r($idB);

    $nameCat = $_POST['category'];
  $nameGood = $_POST['goods'];
  $activity = $_POST['activity'];
  $activityG = $_POST['activityG'];
  $short_description = $_POST['short_description'];
  $full_description = $_POST['full_description'];
  $quantity = $_POST['quantity'];
  $disposal = $_POST['disposal'];
  //  echo "string";print_r($idGood); print_r($idCat); print_r($idB);
  //$this->model->Update($idB, $nameCat, $nameGood);

  $this->model->Update3($idB, $nameCat, $nameGood, $idCat, $idGood, $activity, $activityG, $short_description, $full_description, $quantity, $disposal);
  header("Refresh:0");
  //print_r($idGood);
  }
  if(isset($_POST['add'])){
    $idGood = ($this->pages()[$_POST['id']]['idG']);
  $idCat = ($this->pages()[$_POST['id']]['idCat']);
  $idB = $this->pages()[$_POST['id']]['idB'];
    $nameCat = $_POST['category2'];
  $nameGood = $_POST['goods2'];
  $activity = $_POST['activity2'];
  $activityG = $_POST['activityG2'];
  $short_description = $_POST['short_description2'];
  $full_description = $_POST['full_description2'];
  $quantity = $_POST['quantity2'];
  $disposal = $_POST['disposal2'];
  $this->model->Add($idB, $idGood, $idCat, $nameCat, $nameGood, $activity, $activityG, $short_description, $full_description, $quantity, $disposal);

  //print_r($idGood);
  }




  $this->pageData['error'] = "Привет, ". $_SESSION['user'];
$count = $this->model->account();
$this->pageData['count'] = $count;


$pagesNum = $this->model->pagesNumber();
$this->pageData['pagesNumber'] = $pagesNum;


$this->view->render($this->pageTpl, $this->pageData);


}
/*public function goods() {
  $info = $this->model->GetInfo();
  $this->pageData['info'] = $info;
  $category = $this->model->category();
  $this->pageData['cat'] = $category;
  $pagesAdmin = $this->model->pagesAdmin();
  $this->pageData['admin'] = $pagesAdmin;
  $pagesNum = $this->model->pagesNumber();
  $this->pageData['pagesNumber'] = $pagesNum;
  $pagesCatNum = $this->model->pagesCatNumber();
  $this->pageData['pagesCatNumber'] = $pagesCatNum;
//  $category = $this->model->category_public();
//  $this->pageData['cat_pub'] = $category;
  $pag = $this->model->page();
  $this->pageData['ghg'] = $pag;
  $pageg = $this->model->pageg();
  $this->pageData['page'] = $pageg;
  $pageCategory = $this->model->pageCategory();
  $this->pageData['pageCategory'] = $pageCategory;

  ////////////запуск отображения шаблона-таблицы


  ///////////////////////////////////////////////
    $this->view->render($this->pageTpl, $this->pageData);
}
*/
public function out() {
 session_destroy();
 header("Location: /");
}
}
?>
