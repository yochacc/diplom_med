<? session_start(); 


require_once __DIR__.'/app/models/model_profile.php';
	
$data = model_profile();



ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);



?>

<? require_once 'page/includes/head.php' ?>

<body class="top">
	
<? require_once 'page/includes/navbar.php' ?>
	
		
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active" aria-current="page">Профиль</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
		  <h2 style="padding-top: 25px;padding-bottom: 10px;" align="">Ваш профиль</h2>
          <div class="row gutters-sm">
            
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
				<div class="d-flex flex-column align-items-center text-center">
				  <img src="/page/img/<?=$_SESSION ['img']?>" alt="" class="rounded-circle" width="150">
          
          <div class="row">
                    <div class="col-sm-12">
					<a  class="css-modal-open" href="#prof">Изменить данные</a>
        </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
					<a  class="css-modal-open" href="#profredimg">Загрузить изображение</a></div>
                  </div>


          <div class="mt-3">
                      <h4><?=$_SESSION['login']?></h4>
                    
                    </div>
                  </div>
				<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ваш логин</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
					<?=$_SESSION['login']?>
                    </div>
                  </div>
				  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ф.И.О</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
					<?=$_SESSION['name']?>
   
                    </div>
                  </div>
                  <hr>
                

				  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ваши анализы</h6>
                    </div>
                    <div class="col-sm-3">
        
                    <?php
// Проверяем наличие активной сессии
if (session_status() === PHP_SESSION_ACTIVE) {
    if (!empty($data['clients'])) {
        for ($i = 0; $i < count($data['clients']); $i++) {
            // Проверяем ID клиента
            if ($data['clients'][$i]['name'] == 	$_SESSION['name']) {
                for ($a = 0; $a < count($data['clients'][$i]['analyz']); $a++) { ?>
                    <p ><?php echo $data['clients'][$i]['analyz'][$a]['name']; ?><a class="css-modal-open" href="#info<?=$data['clients'][$i]['analyz'][$a]['id']; ?>">просмотр</a>
  </p>
                  
                <?php }
               
            }
        }
    } else { ?>
        <div class="prod-none">Нет ваших анализов!</div>
    <?php }
} else { ?>
    <div class="prod-none">Авторизуйтесь для доступа к данным!</div>
<?php } ?>



           <? if (!empty($data['analyz'])) {  
             for($a = 0; $a< count($data['analyz']); $a++){ ?> 

<div class="dmap-overlay" id="info<?=$data['analyz'][$a]['id']; ?>">
    <div class="dmap-table">
        <div class="dmap-cell">
            <div class="dmap-modal">
              
               
               
               
                <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">

        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
         
					

					
            <? for($j = 0; $j < count($data['analyz'][$a]['doctor']); $j++){ ?> 
              <span class="font-weight-bold">Врач</span>
              <img class="serviceaimgdoc" width="150px" src="/page/img/<? echo $data['analyz'][$a]['doctor'][$j]['img']; ?>">
              <span class="text-black-50"><? echo $data['analyz'][$a]['doctor'][$j]['name']; ?></span>
            
              <? } ?>
             
           
              <span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Ваш анализ</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Название</label><input type="text" class="form-control" placeholder="first name" value="<?=$data['analyz'][$a]['name']?>"></div>
                    <div class="col-md-6"><label class="labels">Дата получение</label><input type="text" class="form-control" placeholder="first name" value="<?=$data['analyz'][$a]['data']?>"></div>

                  </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Описание</label></div>
                    <div class="col-md-12">
                    <textarea name="textarea" rows="5" disabled="" style="height: 125px;width: 100%;"><?=$data['analyz'][$a]['desc']?></textarea></div>
                </div>
                
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button"><a href="#close" >Закрыть</a></button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Врач</span><span class="border px-3 p-1 add-experience"></div><br>
                <? for($j = 0; $j < count($data['analyz'][$a]['doctor']); $j++){ ?> 
              
            
                <div class="col-md-12"><label class="labels">Ф.И.О</label><input type="text" class="form-control" placeholder="experience" value="<? echo $data['analyz'][$a]['doctor'][$j]['name']; ?>"></div> <br>
                <? } ?>  
               
            
            </div>
            
              </div>
        </div>
    </div>
</div>
</div>
</div>
               
      


			</div>
			  
			 
            </div>
       





<? } ?>
			<? }else{ ?>
				<div class="prod-none">Врачи не найдены!</div>
			<? } ?>

  
</div>





                  </div>
                  </div>
                  <hr>

 






         



            </div>
          </div>

        </div>
    </div>


<div class="dm-overlay" id="prof">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
                <h3>Ваши данные</h3><br>
			
				<form action="/app/edit_profile.php" method="POST"> 
						<div class="container">
							<input type="text" name="login_f" id="login"  minlength="4" maxlength="30" value="<?=$_SESSION['login']?>" style="display:none"><br>
							<label for='Lpass'>Логин</label><br>
              <input type="text" name="login" id="login"  minlength="4" maxlength="30" placeholder="Введите логин" required value="<?=$_SESSION['login']?>"><br>
							<label for='Lpass'>ФИО</label><br>
              <input type="text" name="name" id="name" required minlength="4" maxlength="30" placeholder="Введите имя" value="<?=$_SESSION['name']?>"><br>
              <label for='Lpass'>Пароль</label><br>
							<input type="password" name="password" id="password" minlength="4" maxlength="30" placeholder="Введите пароль"><br>
							<input type="text" style="display:none" name="img" id="img"   value="<?=$_SESSION['img']?>">
							<input type="text" style="display:none"  name="id_analyz" id="id_analyz"   value="<?=$_SESSION['id_analyz']?>">

							<button type="submit" name="do_signup" class="registerbtn">Изменить данные</button>
						</div>
					</form>
            </div>
        </div>
    </div>
</div>	


<div class="dm-overlay" id="profredimg">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
                <h3>Ваши данные</h3><br>
			
				<form action="/app/edit_profile.php" method="POST"> 
						<div class="container">
            <input type="file" name="img" id="img"   value="<?=$_SESSION['img']?>"><br>

							<input type="text" style="display:none" name="login_f" id="login"  minlength="4" maxlength="30" value="<?=$_SESSION['login']?>" style="display:none">
							<input type="text" style="display:none" name="login" id="login"  minlength="4" maxlength="30" placeholder="Введите логин" required value="<?=$_SESSION['login']?>">
							<input type="text" style="display:none" name="name" id="name" required minlength="4" maxlength="30" placeholder="Введите имя" value="<?=$_SESSION['name']?>">
              <input type="text" style="display:none"  name="id_analyz" id="id_analyz"   value="<?=$_SESSION['id_analyz']?>">

							<input type="password" style="display:none" name="password" id="password" minlength="4" maxlength="30" placeholder="Введите пароль">

							<button type="submit" name="do_signup" class="registerbtn">Загрузить изображение</button>
						</div>
					</form>
            </div>
        </div>
    </div>
</div>	





	<? require_once 'page/includes/navbarf.php' ?>
	
</body>
</html>