<? 
	session_start(); 
	require_once __DIR__.'/app/models/model_products.php';
	$data = !empty($_GET['search'])?model_products($_GET['search']):model_products()
?>
<? require_once 'page/includes/head.php' ?>
<body id="top">
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
<h2 align="center">Предоставляемые Услуги</h2>
<section class="section service-2">
	<div class="container">
		<div class="row">
		<? if(!empty($data['products'])){
				for($i = 0; $i < count($data['products']); $i++){ ?> 
			<div class="col-lg-4 col-md-6 col-sm-6">
			<div class="serviceaimg">
					<img class="serviceaimgimg" src="/page/img/<? echo $data['products'][$i]['img']; ?>" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color"><? echo $data['products'][$i]['name']; ?></h4>
						<p class="mb-4">Стоимость: <? echo $data['products'][$i]['price']; ?>р.</p>
						<a  class="css-modal-open" href="#info<?=$i.'000'?>">Описание</a>
					</div>
				</div>
			</div>	
			<? } ?>
			<? }else{ ?>
				<div class="prod-none">Данные услуги не найден!</div>
			<? } ?>
		</div>
	</div>
</section>
<? if(!empty($data['products'])){
				for($i = 0; $i < count($data['products']); $i++){ ?> 
  <div class="dmap-overlay" id="info<?=$i.'000'?>">
    <div class="dmap-table">
        <div class="dmap-cell">
            <div class="dmap-modal">
                <a href="#close" class="close">X</a>
                <div class="" >
                  <h3>Описание</h3>
                <p><? echo $data['products'][$i]['desc']; ?></p><br>
                </div> 
            </div>
        </div>
    </div>
</div>
<? } ?>
			<? }else{ ?>
				
			<? } ?>
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">Мы рады предложить вам <span class="title-color">шанс иметь крпкое здоровье</span></h2>
					<a href="appoinment.php" class="btn btn-main-2 btn-round-full">Записаться на прием<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<? require_once 'page/includes/navbarf.php' ?>
  </body>
  </html>