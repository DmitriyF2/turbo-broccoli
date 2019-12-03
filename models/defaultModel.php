<?php
global $bb;
$bb = 'DESC';
class defaultModel extends Model {
  public $special = '';
  public $maxNotes = 10; //КОЛИЧЕСТВО ЗАПИСЕЙ на странице таблицы СПИСОК АКТИВНЫХ ТОВАРОВ
  public $maxCatNotes = 10; //КОЛИЧЕСТВО ЗАПИСЕЙ на странице СПИСОК АКТИВНЫХ КАТЕГОРИЙ
  public function checkUser() {
    $this->message = '$error';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $error = 'Неверный логин и/или пароль';
    $check = 'Данные введены верно';
    $sql = "SELECT * FROM users WHERE login = :login AND password = :password";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($res)){
        $_SESSION['user'] = $_POST['login'];
      header('Location: /admin/'); //вход для зарегистрированных пользователей логин/пароль Дмитрий/123
      $this->message = "Привет, ". $login;
      echo $message;
    } else {
$this->message = $error;
      echo $message;
      return false;
    }
  }
  public function sort() {

     if (isset($_POST['button_1']))  {
       if ($_POST['button_1'] == 'DESC') {

          $_SESSION['button1'] = 'ASC';
       } if ($_POST['button_1'] == 'ASC') {

          $_SESSION['button1'] = 'DESC';
       }
    //header("Location: $save");

header('Location: '.$_SERVER['REQUEST_URI']);

    }

  $bb = $_SESSION['button1'];


      return $bb;

  }










  public function count() {
    $sql = "SELECT COUNT(DISTINCT goods.idG) AS qty
         FROM base
     INNER JOIN category on base.id_category = category.nameCat
     INNER JOIN goods on base.id_goods = goods.name
     WHERE goods.activityG='1'
    ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchColumn();
    return $res;
  }
/////////// Подключение к основному виду или только список товаров или все сразу (и товары и категории) - принцип: вид определяет какой сейчас контроллер-и вызывает слой вида из модели этого контролера
  public function tables() {
     $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
     if ($url[3] == 'selected_category') {
$tables = 'main_goods.tpl.php';

} else {
  $tables = 'layout.tpl.php';
}
    return $tables;
  }
//////////////////////////////////////////////////////////////////////
public  function pagesAdmin() {
  $admin = '';
  return $admin;
}
public function pagesAdminSpecial() {
  $adminSpecial = $this->special;
  return $adminSpecial;
}
//////////////////////////////////////////////////////////////////////

  public function countCategory() {
    $sql = "SELECT COUNT(DISTINCT idCat) AS qty
         FROM category
         WHERE category.activity='1'
         ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $resource = $stmt->fetchColumn();
    return $resource;
  }


  public static function pageCategory_Selected() {  ////страница товаров в отобранной категории (+ ошибка роутера при максимум страниц)

  $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  if ($url[3] == 'selected_category'){
  $a = ($url[count($url)-1]);
  $b = str_replace(' ', '', $a);
  if (empty($b)) {
  $b = 1;
  }
  } else {
    $b = 1;
  }

  return $b;
  }

   public static function category_id() {       //////////////////////////////////////////////отработка tables - отражается на ошибках при нумерации и открытии товара
     $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
     if ($url[3] !== 'selected_category'){


     if ($url[1] == 'admin' && count($url) <= 4) {
       $a = ($url[count($url)-1]);
     }
       else if ($url[1] == 'admin' && count($url) > 4) {
       $a = ($url[count($url)-3]);
     } else {
     if ($url[3] == 'tables') {
       $a = ($url[count($url)-1]);
     } else{
       $a = ($url[count($url)-1]); //4
     }
     }
   } else {
     $a = 1;
   }
      $b = str_replace(' ', '', $a);
      if (empty($b)) {
      $b = 1;
     }



    return $b;
  }
  public static function pageg() {                                          //НОМЕР СТРАНИЦЫ ТОВАРА
$url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if ($url[1] == 'admin' && count($url) <= 4 ) {
  $a = 1;
}
  else if ($url[1] == 'admin' && count($url) > 4) {
  $a = ($url[count($url)-3]);
} else {
if (count($url) < 4) {
    $a = ($url[count($url)-1]); //2
} else  {
    $a = ($url[count($url)-3]);
}
}
  //    $a = ($url[count($url)-2]);
    $d = str_replace(' ', '', $a);
    if (empty($d)) {
    $d = 1;
    }

    return $d;
  }
  public function pageCategory() {                                               //НОМЕР СТРАНИЦЫ КАТЕГОРИИ
$url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//$h = a::b();
//echo $h[0];

if ($url[1] == 'admin' && count($url) <= 4 || $url[2] == 'page') {
  $a = 1;


} else  {

    $a = ($url[count($url)-1]); //4
  }
    $g = str_replace(' ', '', $a);
    if (empty($g)) {
    $g = 1;
    }
    return $g;
  }

  public function page() {                                                             //ОТ КАКОЙ ЦИФРЫ ПОКАЗЫВАТЬ ЗНАЧЕНИЯ БАЗЫ ДАННЫХ - ТОВАРЫ (LIMIT)
    $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));



    if ($url[1] == 'admin' && count($url) <= 4 ) {
      if ($url[2] == 'page') {
      $a = 1;} else {
      $a = ($url[count($url)-1]);
  }
    }
      else if ($url[1] == 'admin' && count($url) > 4) {
      $a = ($url[count($url)-3]);
    } else {
      if (count($url) < 4) {
          $a = ($url[count($url)-1]); //2
      } else  {
          $a = ($url[count($url)-3]);
      }

    }



    $b = str_replace(' ', '', $a);
    if (empty($b)) {
    $b = 1;
    }
    if (is_numeric ($b)) {

    $math = ($b-1)*$this->maxNotes;
    return $math;
  } /* else {                //можно также вызвать ошибку внутри контроллера - отобразится не чистая страница с ошибкой, а пустая таблица и текст ошибки.
    http_response_code(404);
    include('my_404.php');
    die();


  } */
  }
    public function pageCountCategory() {                                              //ОТ КАКОЙ ЦИФРЫ ПОКАЗЫВАТЬ ЗНАЧЕНИЯ БАЗЫ ДАННЫХ - КАТЕГОРИИ (LIMIT)
      $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($url[1] == 'admin' && count($url) <= 4  || $url[2] == 'page') {
$a = ($url[count($url)-4]);
}
  else if ($url[1] == 'admin' && count($url) >= 4 ) {
  $a = ($url[count($url)-1]);
} else {

if (count($url) < 4) {
      $a = ($url[count($url)-3]); //2
  } else  {
      $a = ($url[count($url)-1]);
  }
}






      $b = str_replace(' ', '', $a);
      if (empty($b)) {
      $b = 1;
      }
      if (is_numeric ($b)) {
      $math = ($b-1)*$this->maxCatNotes;
      return $math;
    }/*else {
            http_response_code(404);
      include('my_404.php');
      die();
    } */
    }








    public function category_selected() {
$sort = defaultModel::sort();
if ($sort == 'DESC') {
  $sort2 = 'ASC';
} else {
  $sort2 = 'DESC';
}

    //$sort = defaultModel::sort();
    $selected_cat = $this->pageCategory_Selected();
    $mathc = $this->page();
    $sql = "SELECT DISTINCT @n:=@n+1 as `num`, idG, name, idB, idCat, nameCat, id_category, id_goods, short_description, full_description, disposal, activity, activityG from

   (select DISTINCT @n:=0, idG, name, base.idB, idCat, nameCat, base.id_category, base.id_goods, goods.short_description, goods.full_description, goods.disposal, category.activity, goods.activityG
   FROM base

   INNER JOIN category on base.id_category = category.nameCat
   INNER JOIN goods on base.id_goods = goods.name
   WHERE category.activity='1' AND goods.activityG='1'
  ) AS T

  ORDER BY idG $sort

    ";
     $result = array();
     $stmt = $this->db->prepare($sql);
     $stmt->execute();
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       $result[$row['num']] = $row;
     }
     return $result;
    }

  public function pageCategory_Selected2() {

    $sort = defaultModel::sort(); //////////////////////////////////////////////////////на переключатель сортировки (DESC/ASC)
    $mathc = $this->page();
    $sql = "SELECT DISTINCT @n:=@n+1 as `num`, idG, name, idB, idCat, nameCat, id_category, id_goods, short_description, full_description, disposal, activity, activityG from

    (select DISTINCT @n:=0, idG, name, base.idB, idCat, nameCat, base.id_category, base.id_goods, goods.short_description, goods.full_description, goods.disposal, category.activity, goods.activityG
    FROM base

    INNER JOIN category on base.id_category = category.nameCat
    INNER JOIN goods on base.id_goods = goods.name
    WHERE category.activity='1' AND goods.activityG='1'
    GROUP BY id_goods) AS T

    ORDER BY num $sort


    ";
     $result = array();
     $stmt = $this->db->prepare($sql);
     $stmt->execute();
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       $result[$row['idB']] = $row;
     }
     return $result;
    }








  public function category_public() {

$sort = defaultModel::sort(); //////////////////////////////////////////////////////на переключатель сортировки (DESC/ASC)
 $mathc = $this->page();
 $sql = "SELECT DISTINCT @n:=@n+1 as `num`, idG, name, idB, idCat, nameCat, id_category, id_goods, short_description, full_description, disposal, activity, activityG from

(select DISTINCT @n:=0, idG, name, base.idB, idCat, nameCat, base.id_category, base.id_goods, goods.short_description, goods.full_description, goods.disposal, category.activity, goods.activityG
FROM base

INNER JOIN category on base.id_category = category.nameCat
INNER JOIN goods on base.id_goods = goods.name
WHERE category.activity='1' AND goods.activityG='1'
GROUP BY id_goods) AS T

ORDER BY num $sort

 LIMIT $mathc,$this->maxNotes
 ";
   $result = array();
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     $result[$row['idB']] = $row;
   }
   return $result;
  }

public function onlyCategory() {       //////////////////////////////////////////////////////////////////////////////////////
$mathg = $this->pageCountCategory();
  $sql = "SELECT @n:=@n+1 as `num`, idCat, nameCat FROM (SELECT @n:=0, idCat, nameCat
  FROM category
  WHERE category.activity='1' ) as T
  ORDER BY `num`

  LIMIT $mathg,$this->maxCatNotes";
  $result = array();
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $resultCategory[$row['num']] = $row;
  }
  return $resultCategory;

}
/////////категории c графой activity
public function onlyCategoryActiv() {
$mathg = $this->pageCountCategory();
  $sql = "SELECT idCat, nameCat
  FROM category
  GROUP BY idCat
  LIMIT $mathg,$this->maxCatNotes";
  $result = array();
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $resultCategory[$row['idCat']] = $row;
  }
  return $resultCategory;

}
///////////////////////////////////////////////////////////////// КОЛИЧЕСТВО СТРАНИЦ ДЛЯ ПАГИНАЦИИ (таблица товаров)
public function pagesCatNumber() {
$pagesCatNumber = ceil($this->countCategory()/$this->maxCatNotes);
if ($this->countCategory() == 0) {
  $pagesCatNumber = 1;
}
  return $pagesCatNumber;
}
public function pagesN() {
return $this->maxNotes;
}
public function pagesCatN() {
return $this->maxCatNotes;
}
 /////////////////////////////////////////////////////// КОЛИЧЕСТВО СТРАНИЦ ДЛЯ РОУТЕРА (Категории и внутренняя таблица товаров)
 public function pagesCatNumberRout() {
   $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
   if ($url[3] == 'tables' || $url[4] == 'tables') {
     $pagesCatNumber = $this->count();
   } else {
     $pagesCatNumber = ceil($this->countCategory()/$this->maxCatNotes);
     if ($this->countCategory() == 0) { // Отсутствие данных в БД
       $pagesCatNumber = 1;
     }

   }
 return $pagesCatNumber;
}
/////////////////////////////////////////////////////////// КОЛИЧЕСТВО СТРАНИЦ ДЛЯ ПАГИНАЦИИ (таблица товаров)
public function pagesNumber_selected() {
}
  public function pagesNumber() {
    $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if ($url[3] == 'selected_category') {
      $pagesNumber = $this->countCategory();
    } else {
 $pagesNumber = ceil($this->count()/$this->maxNotes);
 if ($this->count() == 0 || $url[3] == 'selected_category') {
   $pagesNumber = 1;
 }
}
    return $pagesNumber;
  }
}






?>
