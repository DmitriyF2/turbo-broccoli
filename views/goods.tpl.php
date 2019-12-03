<div class="site-table" style="padding-left: 1em;text-align:left; position: relative; left: 0em; top: 3em; bottom: 3em; right: 0em; background:#FFFFFF;  z-index: 1;">
<?php
foreach($pageData['cat'] as $key => $value) if ($value['num'] == $pageData['cat_id']) {
echo "<h1>Товар: " . $value['id_goods'] . "</h1>";
break;
}?>
<div class="table-category" style="padding: 2em;">
<table border="1" width="95%" cellpadding="5">
	<thead>
   	<tr>
    	<th>Номер</th>
			<th>Название товара</th>
			<th>Категория товара</th>
			<th>Краткое описание</th>
			<th>Полное описание</th>
			<th>Возможность заказа</th>
			<th>Заказать</th>
   	</tr>
	</thead>
	<tbody>
<?php
//print_r($pageData['cat']);
foreach($pageData['cat'] as $key => $values) if ($values['num'] == $pageData['cat_id']) {
$G=1;
if ($values['num'] !=='') {

	echo "<tr>";
	echo "<td>" . $values['num'] . "</td>";
	echo "<td>" . $values['id_goods'] . "</td>";


echo "<td>" ;
echo "<ul>";
foreach($pageData['cat2'] as $key => $values2) if ($values['name'] == $values2['name']) {

echo "<li>";

	echo "<a href='$pageData[special]/goods/$pageData[page]/selected_category/$values2[idCat]'>" . $values2['nameCat'] . "</a>";







echo "</li>";

}
echo "</ul>";
echo "</td>";

echo "<td>" . $values['short_description'] . "</td>";
echo "<td>" . $values['full_description'] . "</td>";
echo "<td>" . $values['disposal'] . "</td>";

if ($values['disposal'] > 0) {
	echo "<td><button type='submit'>Заказать</button></td>";

}

	echo "<tr>";
break;
}
} else {
	$G=0;
}
if ($G==0) {
//	http_response_code(404);
//	include('my_404.php'); // provide your own HTML for the error page
//	die();

}






?>

	</tbody>
 </table>
</div>

</div>

<footer>
	 <div class="footer" style="padding-right: 1em;text-align:right; position: fixed; left: 0em; bottom: 0em; right: 0em; background:#D3D3D3; height: 3em">
		 <p>Официальный магазин электроники</p>
	 </div>
 </footer>
  </body>
</html>
