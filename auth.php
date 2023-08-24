<? 	session_start(); ?>

<? require_once 'page/includes/head.php' ?>

<body class="top">
	
  	<? require_once 'page/includes/navbar.php' ?>
	
	  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Вход</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Регистрация</label>
		<div class="login-form">
			<div class="sign-in-htm">
			<form action="/app/auth.php" method="POST">
				<div class="group">
					<label for="user" class="label">Login</label>
					<input type="text"class="input"    name="login" id="login" required minlength="4" maxlength="30" placeholder="Введите логин" />
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input type="password" class="input"   name="password" id="password" required minlength="4" maxlength="30" placeholder="Введите пароль" />
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Вход">
				</div>
				
				</form>
			</div>
			<div class="sign-up-htm">
			<form action="/app/register.php" method="POST" >


				<div class="group">
					<label for="user" class="label">Login</label>
					<input type='text' class="input"  name="login" id="login"  minlength="4" maxlength="30" placeholder="Введите логин" required />
				</div>
				
				<div class="group">
					<label for="pass" class="label"> Password</label>
					<input type='password' class="input"  name="password" id="password" required minlength="4" maxlength="30" placeholder="Введите пароль"/>
				</div>

				<div class="group">
					<label for="pass" class="label">Username</label>
					<input type='text'class="input"  name="name" id="name" required minlength="4" maxlength="30" placeholder="Введите имя" />
				</div>
				<div class="group">
					
					<input type="text" class="input" name="img" id="img"   maxlength="100"  value="df.jpg" style="display:none">
					<input type='text' class="input"  name="id_analyz" id="id_analyz"  placeholder="" value="0" style="display:none"/>

				</div>
				<div class="group">
					<input type="submit" class="button" value="Регистрация">
				</div>
				
			</form>
			
			</div>

		</div>
	</div>
</div>





					
<? require_once 'page/includes/navbarf.php' ?>
				
				
				
			
</body>
</html>
