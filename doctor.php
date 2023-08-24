<? 

	session_start();

	require_once __DIR__.'/app/models/model_doctors.php';
	
	$data = !empty($_GET['search'])?model_doctors($_GET['search']):model_doctors();

	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(E_ALL);
	


?>

<? require_once 'page/includes/head.php' ?>

<body class="top">
	
<? require_once 'page/includes/navbar.php' ?>



<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white"></span>
          <h1 class="text-capitalize mb-5 text-lg"></h1>

         
        </div>
      </div>
    </div>
  </div>
</section>


<!-- portfolio -->
<section class="section doctors">
  <div class="container">
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Врачи</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p></p>
                </div>
            </div>
        </div>

    

    <div class="row shuffle-wrapper portfolio-gallery">
      
	
	<? if(!empty($data['doctors'])){
				for($i = 0; $i < count($data['doctors']); $i++){ ?> 
	
	<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat1&quot;,&quot;cat2&quot;]">
	      	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
	            <div class="doctor-img">
					<img class="serviceaimgdoc" src="/page/img/<? echo $data['doctors'][$i]['img']; ?>" alt="doctor-image" class="img-fluid w-100">
	               </div>
	            </div>
                <div class="content mt-3">
      
                	<h4 class="mb-0"><a href="#info<?=$i.'000'?>"><? echo $data['doctors'][$i]['name'] ?></a></h4>
                	
					<? for($a = 0; $a < count($data['doctors'][$i]['special']); $a++){ ?> 
						<p> <? echo $data['doctors'][$i]['special'][$a]['name']; ?></p>

						<? } ?>
				
                </div> 
	      	</div>
      	</div>
      
		  <div class="dmap-overlay" id="info<?=$i.'000'?>">
    <div class="dmap-table">
        <div class="dmap-cell">
        <h2 style="background-color: #ffffff;">Пациенты</h2>
      
            <div class="dmap-modal">
               
		  <? for($j = 0; $j < count($data['doctors'][$i]['clients']); $j++){ ?> 



               

				<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat1&quot;,&quot;cat2&quot;]">
	      	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
	               <div class="doctor-img">
	               		<img src="/page/img/<? echo $data['doctors'][$i]['clients'][$j]['img']; ?>" alt="doctor-image" class="img-fluid w-100">
	               </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0">Имя:  <? echo $data['doctors'][$i]['clients'][$j]['name']; ?></h4>
                	<p> Ник: <? echo $data['doctors'][$i]['clients'][$j]['login']; ?></p>
                </div> 
	      	</div>
      	</div>





      

<? } ?>

          
</div>
<a href="#close" style="background-color: #ffffff;"  > 
        <h5 style="background-color: #ff5454;">Закрыть</h5></a>
        </div>
    </div>
</div>





		  <? } ?>
			<? }else{ ?>
				<div class="prod-none">Врачи не найдены!</div>
			<? } ?>


      

      
    </div>
  </div>
</section>
















<?
if($_SESSION['doctor'] == true){
echo '<a class="css-modal-open" align="center" href="#cm-add">Добавить Врача</a>';
}
?>



<div class="dm-overlay" id="cm-add">
    <div class="dm-table">
        <div class="dm-cell">
            <div class="dm-modal">
                <a href="#close" class="close">X</a>
                <form action="/app/doctor.php" method="POST"> 
				
						<input type="text" name="type" value="add_cm" style="display:none">
						<label for='Lemail'>Врач</label><br>
						<input type="text" name="name" minlength="1" placeholder="Введите Ф.И.О врача" required value=""><br>
						<label for='Lemail'>Описание</label><br>
							<input type="text" name="desc" id="name" placeholder="Введите описание" required value=""><br>
              <label for='Lemail'>Добавить изображение</label><br>
							<input type="file" name="img" id="img" minlength="1" placeholder="Название изображение" required value=""><br>
						<button type="submit" class="registerbtn">Добавить Врача</button>
					
				</form>
              
                
            </div>
        </div>
    </div>
</div>















<? require_once 'page/includes/navbarf.php' ?>

  </body>
  </html>