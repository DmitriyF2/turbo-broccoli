<?php
class tablesModel extends Model {

   public $pagesNumber;
   public $math;
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

       header('Location: /admin');
       $this->message = "Привет, ". $login;
       echo $message;
     } else {
 $this->message = $error;
       echo $message;
       return false;


     }
   }

   ////////////////////////////////////////////////
     public function tables() {
       $tables = 'goods.tpl.php';
       return $tables;
     }

   //////////////////////////////////////////////////////////////////////
  public function account() {
 $sql = "SELECT COUNT(*) FROM base";
 $stmt = $this->db->prepare($sql);
 $stmt->execute();
 $res = $stmt->fetchColumn();
 return $res;
  }
  public function category_id() {
    $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

      $a = ($url[count($url)-1]);

     $b = str_replace(' ', '', $a);
     if (empty($b)) {
     $b = 1;
   }
   if (is_numeric ($b)) {
    return $b;
  }else {
  //  http_response_code(404);
  //  include('my_404.php');
  //  die();
  }
  }
  public function pageg() {

    $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

      $a = ($url[count($url)-3]);
    $b = str_replace(' ', '', $a);
    if (empty($b)) {
    $b = 1;
    }
    if (is_numeric ($b)) {


    return $b;
  }else {
  //  http_response_code(404);
  //  include('my_404.php');
  //  die();
  }
}
 /*public function page() {

   $a = (explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[2]);
   $b = str_replace(' ', '', $a);
   if (empty($b)) {
   $b = 1;
   }

   $math = 0;
   return $math;

 }*/
public function category2() {
  $sql = "SELECT @n:=@n+1 as `num`,name, idG, idCat, idB, id_category, id_goods, nameCat, short_description, full_description, disposal, activity from
 (select DISTINCT @n:=0, name,  idG, idCat,  base.idB, base.id_category, base.id_goods, category.nameCat, goods.short_description,  goods.full_description, goods.disposal,category.activity
 FROM base
 INNER JOIN category on base.id_category = category.nameCat
 INNER JOIN goods on base.id_goods = goods.name
 WHERE category.activity='1' AND goods.activityG='1'
 ) AS T
 ORDER BY num

  ";
    $result = array();
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $result[$row['idB']] = $row;
    }
    return $result;
}
  public function category() {

//$acco = $this->account();
 //$mathc = $this->page();

 $sql = "SELECT @n:=@n+1 as `num`, name, idG, idCat, idB, id_category, id_goods, nameCat, short_description, full_description, disposal, activity from
(select DISTINCT @n:=0, name,  idG, idCat, base.idB, base.id_category, base.id_goods, category.nameCat, goods.short_description,  goods.full_description, goods.disposal,category.activity
FROM base
INNER JOIN category on base.id_category = category.nameCat
INNER JOIN goods on base.id_goods = goods.name
WHERE category.activity='1' AND goods.activityG='1'
GROUP BY name) AS T
ORDER BY num

 ";
   $result = array();
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     $result[$row['idB']] = $row;
   }
   return $result;
  }
  public function pagesAdminSpecial() {
    $adminSpecial = $this->special;
    return $adminSpecial;
  }
  public function pagesNumber() {
 $pagesNumber = ceil($this->account()/$this->account());
    return $pagesNumber;
  }
 }
 ?>
