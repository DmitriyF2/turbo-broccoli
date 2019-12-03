<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>123</title>
	<meta name="vieport" content="width=device-width, initial-scale=1">
	<style>
	li {
	 margin: 1em;
	}
	td {
		vertical-align:center; align:center; padding: 1em; margin: 1em;
	}
		.account-form {
	 width: 250px; border: 4px double #99CCFF; padding: 1em 1em 2em; text-align:center; position: absolute; right: 1em; top: -14.5em; background:#99CCFF; transition-duration: 1s; transition-delay: 2s;
	}
		 .account-form:hover {
			border: 4px double #8B0000; border-radius: 0em 0em 0em 2em ;padding: 1em 1em 2em; text-align:center; position: absolute; right: 1em; top: 0em; background:#DEB887; transition: .3s;
		 }
		 .input-group-user{
			 padding: 0.5em;
		 }
		 .input-group{
			 margin-top: -4em;
		 }
.input-group-checkbox {
	padding-top: 0.1em;
}
		 .for-submit {
				padding-top: 0.5em;
				padding-bottom: 1.5em;
		 }
.no-accounts {
	padding-top: 0.3em;
}
		 .info {
			 padding-top: 0.0em;
			 margin-bottom: -2.4em;
		 }
		</style>
	</head>
	<body>

<div class="site-table" style="padding-left: 1em;text-align:left; position: absolute; left: 0em; top: 3em; bottom: 3em; right: 0em; background:#FFFFFF;  z-index: 1;">
<?php



foreach($pageData['cat'] as $key => $value)  if ($value['id'] == $pageData['cat_id']){

echo "<li>";
echo($value['id_category']);

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
/*
if ($G==0) {
	http_response_code(404);
	include('my_404.php'); // provide your own HTML for the error page
	die();

} */






?>
	</tbody>
	</tbody>
 </table>
</div>
 <div class="Pagination" style="padding-left: 2em;">

</div>
</div>

<footer>
	 <div class="footer" style="padding-right: 1em;text-align:right; position: fixed; left: 0em; bottom: 0em; right: 0em; background:#D3D3D3; height: 3em">
		 <p>Официальный магазин электроники</p>
	 </div>
 </footer>
  </body>
</html>
