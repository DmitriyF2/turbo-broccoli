<div class="site-table" style="padding-left: 1em;text-align:left; position: relative; left: 0em; top: 6em; bottom: 6em; right: 0em; background:#FFFFFF;  z-index: 1;">
<h1 style="text-align:center">Магазин электроники</h1>
<div align="left" class="table-category" style="position: absolute; padding: 2em; width:45%; float:left">
	<h3 style="text-align:center">Товары</h3>
<table text-align="left" border="1" width="100%" cellpadding="5">
	<thead>
   	<tr>
    	<th>Номер</th>
			<th>Название товара</th>

   	</tr>
	</thead>
	<tbody>
<?php

if(!empty($pageData['cat_pub'])) {

foreach($pageData['cat_pub'] as $key => $value) {
//global $save; //Передача параметра для пагинации - позволяет при сортировке использовать header и оставаться там же
$save = "$pageData[special]/goods/$pageData[page]/tables/$value[num]";

	echo "<tr>";
	echo "<td>" . $value['num'] . "</td>";
	echo "<td><a href='$save'>" . $value['name'] . "</a></td>";



	echo "<tr>";



}
}


 /*else {

	http_response_code(404);
	include('my_404.php');
	die();
}*/


?>
	</tbody>
	</tbody>
 </table>
 <div class="Pagination" style="padding-left: 2em; padding: 1em;">
<table>
	<table>
		<tr>
 <?php

if (($pageData['pagesNumber']) > 1) {
for ($i=1; $i<=$pageData['pagesNumber']; $i++) {
	echo "<td>";
	echo "<div style='padding: 2px;'>";
echo	"<form action='$pageData[special]/goods/$i/category/$pageData[pageCategory]' method='post'>";
echo	"<button type='submit'>$i</button>";
echo	"</form>";
echo "</div>";
echo "</td>";
}
}

/* echo "<i>";
  for ($i=1; $i<=$pageData['pagesNumber']; $i++) {

echo "<a href='$pageData[special]/goods/$i/category/$pageData[pageCategory]'>$i</a> ";

 } echo "</i>";
} */
 ?>
 </tr>
</table>
</table>
 </div>
 <div>
<?php


?>
	 <form method="POST" action="" style="padding-left: -21px">

	 <?php
if (!empty($_SESSION['button1'])) {
$a = $_SESSION['button1'];
} else {
$a = "DESC";
}



 if ($a == 'DESC') {
 $s = '&#9660';
 } else {
 $s = '&#9650';
 }



echo  "<input type='hidden' name='button_1' value='$a' />";
echo  "<input type='submit' name='button_2' value='Сортировка $s' />";?>
	 </form>



 </div>
</div>





<!-- Работа с категориями ***************************
$a = $_POST['button-1'] + 1; ?>
	 <form method="POST" action="">
	 <?php echo  "<input type='submit' name='button-1' value='$a' />"?>
	 </form>*********************************************************************************************** -->


<div align="right" class="table-category" style="position: relative; padding: 2em; width:45%; float:right">
	<h3 style="text-align:center">Категории</h3>
<table align="right" border="1" width="100%" cellpadding="5">
	<thead>
   	<tr>
    	<th>Номер</th>
			<th>Название категории</th>

   	</tr>
	</thead>
	<tbody>



<?php 	if(!empty($pageData['only'])) {
	 foreach($pageData['only'] as $key => $value) {



	echo "<tr>";
	echo "<td>" . $value['num'] . "</td>";
	echo "<td>" . $value['nameCat'] . "</td>";



	echo "<tr>";



}
} /*else {
	http_response_code(404);
	include('my_404.php');
	die();
} */
?>
	</tbody>
	</tbody>
 </table>


 <!-- Пагинация Категории ************************************************************************************************************************** -->







 <div class="Pagination" style="padding-left: 2em; padding: 1em; float:left; ">

 <table>
	  <tr>
 <?php
if (($pageData['pagesCatNumber']) > 1) {


	for ($q=1; $q<=$pageData['pagesCatNumber']; $q++) {
  	echo "<td>";
  	echo "<div style='padding: 2px;'>";
  echo	"<form action='$pageData[special]/goods/$pageData[page]/category/$q'>";
  echo	"<button type='submit'>$q</button>";
  echo	"</form>";
  echo "</div>";
  echo "</td>";
  }
  }

// Мой способ применения пагинации без метода Get, одновременно настраивает ЧПУ


 ?>
</tr>
</table>

 </table>
 </div>
</div>









</div>
