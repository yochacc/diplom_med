<? 
	session_start();
	if($_SESSION['doctor'] == false){
		header('Location: /');
	}
	
	require_once __DIR__.'/../app/models/model_doctor.php';
	$data = model_doctor();


?>

<? require_once 'includes/head.php' ?>

<body class="top">

	<? require_once 'includes/navbar.php'; ?>		
	<? require_once 'includes/navimg.php'; ?>		
	













	<section class="w3l-grids-3 py-5">
    <div class="container py-md-5">
   
<a  class="css-modal-open" href="#clients"> Пациенты </a>
<a  class="css-modal-open" href="#analiz-add"> Добавить анализ  </a>
<a  class="css-modal-open" href="/page/panel.php"> Панель Главного Врача </a>



<div class="dm-overlay" id="analiz-add">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
                <h3>Добавить анализ </h3>
					<form action="/app/doctor.php" method="POST"  > 
						<div class="container">
						<label for='Lemail'>Название</label><br>
							<input type="text" name="name" id="login"  minlength="1" placeholder="Введите название" required value=""><br>
							<label for='Lemail'>Описание</label><br>
							<input type="text" name="desc" id="login"  minlength="1" placeholder="Введите описание" required value=""><br>
							<label for='Lemail'>Дата</label><br>
							<input name="data" id="data" type="date" class="form-control" required  value="2023-06-15"  min="2005-01-01" >
							<label for='Lemail'>Врач</label><br>
							<input type="text" name="id_doctor" placeholder="Введите ID врача" required value=""><br>
							<input type="text" name="type" value="add_an" style="display:none"><br>
							<button type="submit" name="do_signup" class="css-modal-open">Добавить анализ</button>
						</div>
					</form>
            </div>
        </div>
    </div>
</div>



<div class="dm-overlay" id="analizd-add">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
				<form action="/app/doctor.php" method="POST"> 
				<h3>Привязать анализ<br> к врачу </h3>
						<input type="text" name="type" value="add_docan" style="display:none"><br>
						<input type="text" name="id_pr" placeholder="Введите ID анализа" required value=""><br>

						<input type="text" name="id_doctor" placeholder="Введите ID врача" required value=""><br>
						<button type="submit" class="registerbtn">Добавить</button>
					
				</form>
              
                
            </div>
        </div>
    </div>
</div>






<div class="dm-overlay" id="pr-add">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
                <h3>Добавить специальность </h3>
					<form action="/app/doctor.php" method="POST"  > 
						<div class="container">
						<label for='Lemail'>Название</label><br>
							<input type="text" name="name" id="login"  minlength="1" placeholder="Введите название" required value=""><br>
						<input type="text" name="type" value="add_pr" style="display:none"><br>
							<button type="submit" name="do_signup" class="css-modal-open">Добавить</button>
						</div>
					</form>
            </div>
        </div>
    </div>
</div>

<div class="dm-overlay" id="prd-add">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
				<form action="/app/doctor.php" method="POST"> 
				<h3>Привязать специальность </h3>
						<input type="text" name="type" value="add_dr" style="display:none"><br>
						<input type="text" name="id_special" placeholder="Введите ID врача" required value=""><br>
						<input type="text" name="id_pr" placeholder="Введите ID специальности" required value=""><br>
						<button type="submit" class="registerbtn">Добавить</button>
					
				</form>
              
                
            </div>
        </div>
    </div>
</div>





<div class="dm-overlay" id="uslug-add">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
                <h3>Добавить услугу</h3>
					<form action="/app/doctor.php" method="POST"  > 
						<div class="container">
						<label for='Lemail'>Название</label><br>
							<input type="text" name="name" id="login"  minlength="1" placeholder="Введите название" required value=""><br>
							<label for='Lemail'>Описание</label><br>
							<input type="text" name="desc" id="name" placeholder="Введите описание" required value=""><br>
							<label for='Lemail'>Стоимость </label><br>
							<input type="text" name="price" id="name" minlength="1" placeholder="Введите цену" required value=""><br>
              <label for='Lemail'>Добавить изображение</label><br>
							<input type="file" name="img" id="img" minlength="1" placeholder="Название изображение" required value=""><br>
							<input type="text" name="type" value="add" style="display:none"><br>
							<button type="submit" name="do_signup" class="css-modal-open">Добавить услугу</button>
						</div>
					</form>
            </div>
        </div>
    </div>
</div>




<div class="dm-overlay" id="photo-add">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
                <h3>Добавить фотo</h3>
				<form method="post" enctype="multipart/form-data">
			<input type="file" name="img">
			<br>
			<label>Тип загрузки</label>
			<br>
			<select name="file_type">
				<option value="1">Эскиз</option>
				<option value="2">Большое изображение</option>
			</select>
			<br>
			
			<br>
			<input type="submit" value="Загрузить">
		</form>
            </div>
        </div>
    </div>
</div>















</div>
</div>




<h2 align="center" id="clients"   >Все клиенты</h2>


<section class="section service-3">
	<div class="container">
		<div class="row">

    <? for($i = 0; $i < count($data['clients']); $i++){ ?> 
			<div class="col-lg-4 col-md-6 col-sm-6">
			<div class="serviceaimg">
					<img class="serviceaimgimg" src="/page/img/<? echo $data['clients'][$i]['img']; ?>" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">login: <? echo $data['clients'][$i]['login']; ?></h4>
						<p class="mb-4">Имя: <? echo $data['clients'][$i]['name']; ?></p>
						<a  class="css-modal-open" href="#clients-edit<?=$i.'000'?>"> Изменить</a>
						<a  class="css-modal-open" href="#analysis1<?=$i.'000'?>">Привязать анализ</a>
					</div>
				</div>
			</div>

			
			<? } ?>
			
			
		</div>
	</div>
</section>





  <? for($i = 0; $i < count($data['clients']); $i++){ ?> 




	<div class="dm-overlay" id="clients-edit<?=$i.'000'?>">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">Х</a>
                <h3>Изменить клиента</h3>
                
				<form action="/app/doctor.php" method="POST">
					<div class='field'>
						<label for='Lemail'>Логин</label><br>

						<input type="text" name="login" id="login"  minlength="4" maxlength="30" placeholder="Введите логин" required value="<?=$data['clients'][$i]['login']?>">
					</div><br>
					<div class='field'>
						<label for='Lpass'>Имя</label><br>
						<input type="text" name="name" id="name" required minlength="4" maxlength="30" placeholder="Введите имя" value="<?=$data['clients'][$i]['name']?>">
					</div>
					<div class='field'>
						<input type="hidden" name="analysis" id="analysis" required minlength="4" maxlength="230" placeholder="Введите имя" value="<?=$data['clients'][$i]['analysis']?>">
					</div>
					<div class='field'>
						<label for='Lpass'>Пароль</label><br>
						<input type="password" name="password" id="password" minlength="4" maxlength="30" placeholder="Введите пароль">
					</div>

					<div class='field'>
					<label for='Lpass'>Фото</label><br>
					<input type="file" name="img" id="name" minlength="1" placeholder="Название картинки" required value="<?=$data['clients'][$i]['img']?>">
					</div>
					<input type="text" name="login_f" id="login"  minlength="4" maxlength="30" value="<?=$data['clients'][$i]['login']?>" style="display:none">

					<div class='field'>
					<button type="submit" name="do_signup" class="css-modal-open">Изменить данные</button>
					</div>
				</form>
			</div>
			  
			 
            </div>
        </div>
    </div>
</div>

<? } ?>


<? for($i = 0; $i < count($data['clients']); $i++){ ?> 

	<div class="dm-overlay" id="analysis1<?=$i.'000'?>">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
				<form action="/app/doctor.php" method="POST"> 
				<h3>Привязать анализ </h3>
						<input type="text" name="type" value="add_pac" style="display:none"><br>
						<input type="text" name="id_analyz" placeholder="Введите ID анализа" required value=""><br>
						<input type="hidden" name="id_pac" placeholder="Введите ID пациента" required value="<?=$data['clients'][$i]['id']?>"><br>
						<button type="submit" class="registerbtn">Добавить</button>
					
				</form>
              
                
            </div>
        </div>
    </div>
</div>

<? } ?>






			



















		
	
  
	<div class='overlay'></div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <script  src="/assets/js/index.js"></script>
		
 	<? require_once 'includes/navbarf.php' ?>

</body>
</html>