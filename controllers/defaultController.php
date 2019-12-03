<?php
session_start();
class defaultController extends Controller {
public $pagesAdminSpecial2 = '';
  private $pageTpl = '/views/main.tpl.php';
  public function __construct() {
    $this->model = new defaultModel();
    $this->view = new View();
    $tables = $this->model->tables();
    $this->pageData['tables'] = $tables;
    $this->pageData['title'] = "Главная";
    if (!empty($_POST['password']) && !empty($_POST['login'])) {

      if(!$this->login()) {
        $this->pageData['error'] = $this->model->message;
}

}
if (empty($_POST['password']) && empty($_POST['login'])) {
  $this->pageData['error'] = 'Войти';
}
$pagesAdminSpecial = $this->model->pagesAdminSpecial();
$this->pageData['special'] = $pagesAdminSpecial;
  }

public function default() {






  $countCategory = $this->model->countCategory();
//  $this->pageData['countCat'] = $countCategory;
////////////////////////////////////////////////////////////////////////// ЧПУ
$pagesAdmin = $this->model->pagesAdmin();
$this->pageData['admin'] = $pagesAdmin;

$pagesAdminSpecial = $this->pagesAdminSpecial2;
$this->pageData['special'] = $pagesAdminSpecial;
////////////////////////////////////////////////////////////////////////////


$pagev = $this->model->category_id();
$this->pageData['cat_id'] = $pagev;


defaultController::goods();

//  $this->view->render($this->pageTpl, $this->pageData);

}


public function goods() {




  $pagev = $this->model->category_id();
  $this->pageData['cat_id'] = $pagev;

  $pagevs = $this->model->pagesN();
  $this->pageData['pagN'] = $pagevs;
  $pagevsc = $this->model->pagesCatN();
  $this->pageData['pagCatN'] = $pagevsc;
  ////////////////////////////////////////////////////////////////
  $pagesAdmin = $this->model->pagesAdmin();
  $this->pageData['admin'] = $pagesAdmin;
  $pagesNum = $this->model->pagesNumber();
  $this->pageData['pagesNumber'] = $pagesNum;
  $pagesCatNum = $this->model->pagesCatNumber();
  $this->pageData['pagesCatNumber'] = $pagesCatNum;
  $category = $this->model->category_public();
  $this->pageData['cat_pub'] = $category;
  $pag = $this->model->page();
  $this->pageData['ghg'] = $pag;
  $pageg = $this->model->pageg();
  $this->pageData['page'] = $pageg;
  $pageCategory = $this->model->pageCategory();
  $this->pageData['pageCategory'] = $pageCategory;
  $onlyCategory = $this->model->onlyCategory();
  $this->pageData['only'] = $onlyCategory;
  ////////////запуск отображения шаблона-таблицы


  ///////////////////////////////////////////////
    $this->view->render($this->pageTpl, $this->pageData);
}
public function category() {
  $b= new defaultModel;
  $a = $b->sort();
  $pagev = $this->model->category_id();
  $this->pageData['cat_id'] = $pagev;

  $pagevs = $this->model->pagesN();
  $this->pageData['pagN'] = $pagevs;
  $pagevsc = $this->model->pagesCatN();
  $this->pageData['pagCatN'] = $pagevsc;
  ////////////////////////////////////////////////////////////////
  $pagesAdmin = $this->model->pagesAdmin();
  $this->pageData['admin'] = $pagesAdmin;
  $pagesNum = $this->model->pagesNumber();
  $this->pageData['pagesNumber'] = $pagesNum;
  $pagesCatNum = $this->model->pagesCatNumber();
  $this->pageData['pagesCatNumber'] = $pagesCatNum;
  $category = $this->model->category_public();
  $this->pageData['cat_pub'] = $category;
  $pag = $this->model->page();
  $this->pageData['ghg'] = $pag;
  $pageg = $this->model->pageg();
  $this->pageData['page'] = $pageg;
  $pageCategory = $this->model->pageCategory();
  $this->pageData['pageCategory'] = $pageCategory;
  $onlyCategory = $this->model->onlyCategory();
  $this->pageData['only'] = $onlyCategory;
  ////////////запуск отображения шаблона-таблицы


  ///////////////////////////////////////////////
    $this->view->render($this->pageTpl, $this->pageData);
}
public function selected_category() {
  $this->model->tables === 'main_goods.tpl.php';

  $pagev = $this->model->category_id();
  $this->pageData['cat_id'] = $pagev;

  $pagevs = $this->model->pagesN();
  $this->pageData['pagN'] = $pagevs;

  $pagevsc = $this->model->pagesCatN();
  $this->pageData['pagCatN'] = $pagevsc;
  ////////////////////////////////////////////////////////////////
  $pagesAdmin = $this->model->pagesAdmin();
  $this->pageData['admin'] = $pagesAdmin;

  $pagesNum = $this->model->pagesNumber();
  $this->pageData['pagesNumber'] = $pagesNum;

  $category = $this->model->category_selected();
  $this->pageData['category_selected'] = $category;

  $category_sel = $this->model->pageCategory_Selected();
  $this->pageData['category_sel'] = $category_sel;
  $category_sel2 = $this->model->pageCategory_Selected2();
  $this->pageData['category_selected2'] = $category_sel2;




  $category = $this->model->category_public();
  $this->pageData['cat_pub'] = $category;

  $pag = $this->model->page();
  $this->pageData['ghg'] = $pag;

  $pageg = $this->model->pageg();
  $this->pageData['page'] = $pageg;

  $pageCategory = $this->model->pageCategory();
  $this->pageData['pageCategory'] = $pageCategory;


  ////////////запуск отображения шаблона-таблицы



  $this->view->render($this->pageTpl, $this->pageData);
  ///////////////////////////////////////////////
  //  $this->view->render('/views/main_goods.tpl.php', $this->pageData);
}






public function login() {
  if(!$this->model->checkUser()){

    return false;
  }

}
}
 ?>
