<div class="site-table" style="padding-left: 1em;margin-bottom: 5em;text-align:left; position: relative; left: 0em; top: 3em; bottom: 6em; right: 0em; background:#FFFFFF;  z-index: 1;">

<div class="table-category" style="padding: 1em;">
		<h3 style="text-align:center">Таблица связей</h3>
<table border="1" width="99%" cellpadding="5" style="margin-top: -2em;">
	<thead >
   	<tr>
    	<th>Номер</th>
			<th>Название категории</th>
    	<th>Название товара</th>
				<th style='width: 7em'>Активность категории</th>
			<th style='width: 7em'>Активность товара</th>
			<th>Краткое описание тов</th>
			<th>Полное описание тов</th>
				<th style='width: 7em'>Кол-во на складе</th>
				<th style='width: 7em'>Возможность заказа</th>
			<th>Изменить</th>
   	</tr>
	</thead>
	<tbody>






		<?php  foreach($pageData['cat'] as $key => $value) {



			echo "<form action='' method='post'>";
						echo "<tr>";
								echo "<td><input name='id' type='text' value='$value[idB]' style='width: 4em'; />" . "</td>";

								echo "<td class='zone'><input name='category' type='text' value='$value[id_category]'; />" . "</td>";




								echo "<td><input name='goods' type='text' value='$value[id_goods]'; />" . "</td>";
                echo "<td ><input name='activity' type='text' value='$value[activity]' style='width: 8em'; />" . "</td>";
								  echo "<td ><input name='activityG' type='text' value='$value[activityG]'style='width: 8em'; />" . "</td>";

echo "<td><textarea name='short_description' type='text'; />" . $value['short_description'] . "</textarea></td>";
echo "<td><textarea name='full_description' type='text'; />" . $value['full_description'] . "</textarea></td>";

echo "<td ><input name='quantity' type='text' value='$value[quantity]' style='width: 10em';/>" . "</td>";
echo "<td><input name='disposal' type='text' value='$value[disposal]'style='width: 8em';/>" . "</td>";



								echo "<td><input name='update' type='submit' value='Изменить' /></td>";

			echo "<tr>";

			echo "</form>";

		}

		if(($value == end($pageData['cat'])) && ($pageData['pagesNumber'] == $pageData['cat_id'])) {/////////////////////////////////
	echo "<form action='' method='post'>";

					echo "<tr>";
					$one = $value[idB] +1;
			echo "<td><input name='id' type='text' value='$one' style='width: 4em'; />" . "</td>";
			echo "<td><input name='category2' type='text' value=''; />" . "</td>";
			echo "<td><input name='goods2' type='text' value=''; />" . "</td>";
			echo "<td ><input name='activity2' type='text' value='' style='width: 8em'; />" . "</td>";
			echo "<td ><input name='activityG2' type='text' value='' style='width: 8em'; />" . "</td>";
			echo "<td><textarea name='short_description2' type='text'; /></textarea></td>";
			echo "<td><textarea name='full_description2' type='text'; /></textarea></td>";
			echo "<td ><input name='quantity2' type='text' value='' style='width: 10em'; />" . "</td>";
			echo "<td ><input name='disposal2' type='text' value='' style='width: 8em'; />" . "</td>";

			echo "<td><input name='add' type='submit' value='Добавить' style='background: #CCCCFF;' /></td>";
			echo  "</tr>";
				echo "</form>";
		}

		?>
	<?php //echo "<br><br>"; var_dump($_POST); echo "<br><br>"; var_dump($pageData['cat']);
//	print_r($_POST['add']); print_r($pageData['cat'][$_POST['id']]['idB']); print_r($pageData['cat'][$_POST['id']]['idG']); ?>




<!--	<form action="" method="post" >
	Форма добавления строки в БД
	    <input name="name" type="text" value="name" />
	    <input name="add" type="submit" />
	</form>
-->

<br>
<br>
<br>
<?php

?>

	</tbody>
	</tbody>
 </table>
</div>





<div class="Pagination" style="margin-left: 1em; padding: 1em; float:left; ">

<table>
	 <tr>
<?php

if (($pageData['pagesNumber']) > 1) {


	for ($i=1; $i<=$pageData['pagesNumber']; $i++) {
  	echo "<td>";
  	echo "<div style='padding: 2px;'>";
  echo	"<form action='/admin/page/$i'>";
  echo	"<button type='submit'>$i</button>";
  echo	"</form>";
  echo "</div>";
  echo "</td>";
  }
  }

	?>
 </tr>
 </table>


</div>











	<?php

	//require_once('layout.tpl.php');

	?>

</div>
