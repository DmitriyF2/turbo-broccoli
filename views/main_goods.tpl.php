<?php
if(!empty($pageData['category_selected'])) {
foreach($pageData['category_selected'] as $key => $value) if ($value['idCat'] == $pageData['category_sel']) {
	global $selectedName;
	if (!empty($value['idCat'])) {
	$selectedName = $value['nameCat'];

}
}
}

?>
<div class="site-table" style="padding-left: 1em;text-align:left; position: relative; left: 0em; top: 6em; bottom: 6em; right: 0em; background:#FFFFFF;  z-index: 1;">
<h2 style="text-align:center">Товары выбранной категории: <? if (!empty($selectedName)) { print_r($selectedName);} ?></h2>
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

if(!empty($pageData['category_selected'])) {
foreach($pageData['category_selected'] as $key => $value) if ($value['idCat'] == $pageData['category_sel']) {
	global $selectedName;
	$selectedName = $value;
	print_r($selectedName);
	foreach($pageData['category_selected2'] as $key2 => $value2) if ($value['name'] == $value2['name']) {
//global $save; //Передача параметра для пагинации - позволяет при сортировке использовать header и оставаться там же
$save = "$pageData[special]/goods/$pageData[page]/tables/$value2[num]";
	echo "<tr>";
	echo "<td>" . $value2['num'] . "</td>";
	echo "<td><a href='$save'>" . $value['name'] . "</a></td>";
	echo "<tr>";

}

}


}
?>
	</tbody>
	</tbody>
 </table>
<!-- <div class="Pagination" style="padding-left: 2em; padding: 1em;">
<table>
	<table>
		<tr>
<?php

/*if (($pageData['pagesNumber']) > 1) {
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
*/
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
-->
 <div>
<?php


?>




 </div>
</div>
