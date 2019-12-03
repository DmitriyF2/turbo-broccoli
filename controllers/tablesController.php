<?php
class tablesController extends Controller {
private $pageTpl = '/views/main.tpl.php';
  public function __construct() {
    $this->model = new TablesModel();
    $this->view = new View();
  }
  public function default() {
    $b= new defaultModel;
    $a = $b->sort();
$this->pageData['title'] = "Таблица товаров";
$tables = $this->model->tables();
$this->pageData['tables'] = $tables;
      if (!empty($_POST)) {
        if(!$this->login()) {
          $this->pageData['error'] = $this->model->message;
  }
  ////////////запуск отображения шаблона-таблицы


  ///////////////////////////////////////////////
  }
  if (empty($_POST)) {
    $this->pageData['error'] = 'Войти';
  }

  $pagesAdminSpecial = $this->model->pagesAdminSpecial();
  $this->pageData['special'] = $pagesAdminSpecial;

  $count = $this->model->account();
  $this->pageData['count'] = $count;

  $pagesNum = $this->model->pagesNumber();
  $this->pageData['pagesNumber'] = $pagesNum;

  $pageg = $this->model->pageg();
  $this->pageData['page'] = $pageg;

  $pagev = $this->model->category_id();
  $this->pageData['cat_id'] = $pagev;


  // $pag = $this->model->page();
   //$this->pageData['ghg'] = $pag;

  $category = $this->model->category();
  $this->pageData['cat'] = $category;

  $category2 = $this->model->category2();
  $this->pageData['cat2'] = $category2;

    $this->view->render($this->pageTpl, $this->pageData);

}
public function login() {
  if(!$this->model->checkUser()){

    return false;
  }

}
}
?>
