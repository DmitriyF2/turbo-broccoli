<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $pageData['title']; ?></title>

	<meta name="vieport" content="width=device-width, initial-scale=1">
	<style>


		.account-form {
	 width: 250px; border: 4px double #99CCFF; padding: 1em 1em 2em; text-align:center; position: absolute; right: 1em; top: -13.5em; background:#99CCFF; transition-duration: 1s; transition-delay: 2s;
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
<header>
	<div class="logo-form" style="padding-left: 1em;text-align:left; position: absolute; left: 0em; top: 0em; right: 0em; background:#99CCFF; height: 3em">

	 <div id="logo">
		 <p><a href="http://catalog-site.ru/"><img src="img/logo1.png" class="logotip" alt="Logo-Company"></p></a>
	 </div>
	</div>
</header>


	  <div class="account-form" style="z-index: 2">

	  <form method="post">


	    <span class="input-group"><i>Введите регистрационные данные</i></span>

		  <div class="input-group-user">
	     	 <input type="text" name="login" id="login" class="user" placeholder="Логин" required>
	    </div>

	    <div class="input-group-password">
	    	 <input type="password" name="password" id="password" class="pass" placeholder="Пароль" required>
	    </div>

	    <div class="input-group-checkbox">
	        <input type="checkbox" name="checkbox" id="check-password" class="checkbox-pass">
	      <label class="label" for="check-password">Запомнить</label>
	    </div>


	<div class="for-submit">
	  <button type="submit" name="button" id="button" class="button">Войти</button>
	</div>

	</form>

	<div class="no-account">
	  Нет аккаунта? <a href="registration.php" class="new">Зарегистрироваться</a>
	</div>

	<div class="no-accounts">
	   <a href="#" class="new">Забыли пароль?</a>
	</div>
<div class="info"><p>	<?php if(!empty($pageData['error'])) :?>
									 <p><?php echo $pageData['error']; ?></p>
							 <?php endif; ?>
						 </p><p><?php ini_set('display_errors', 1);
						 error_reporting(E_ALL); ?></p></div>


</div>
<?php
if(isset($pageData['tables'])){
include($pageData['tables']);
}



?>


<footer>
	 <div class="footer" style="padding-right: 1em;text-align:right; position: fixed; left: 0em; bottom: 0em; right: 0em; background:#D3D3D3; height: 3em">
		 <p>Официальный магазин электроники</p>
	 </div>
 </footer>

  </body>
</html>
