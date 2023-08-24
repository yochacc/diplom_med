<? 

	session_start(); 
	require_once 'app/models/model_index.php';
	$data = model_index();
		require_once __DIR__.'/app/models/model_products.php';
		ini_set('display_errors', 0);
		ini_set('display_startup_errors', 0);
		error_reporting(E_ALL);
?>
<? require_once 'page/includes/head.php' ?>
<body class="top">
  	<? require_once 'page/includes/navbar.php' ?>
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Комплексное решение в области здравоохранения</span>
					<h1 class="mb-3 mt-3">Ваш самый надежный партнер в области здравоохранения</h1>
					<p class="mb-4 pr-5"></p>
					<div class="btn-container ">
						<a href="/appoinment.php" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Запись на прием <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>24-часовое обслуживание</span>
						<h4 class="mb-3">Онлайн-запись на прием</h4>
						<p class="mb-4">Получите постоянную поддержку в экстренных случаях.Мы внедрили принцип семейной медицины.</p>
						<a href="/appoinment.php" class="btn btn-main btn-round-full">Запись на прием</a>
					</div>
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>Временной график</span>
						<h4 class="mb-3">Рабочее время</h4>
						<ul class="w-hours list-unstyled">
		                    <li class="d-flex justify-content-between">Пн - Пт : <span>9:00 - 17:00</span></li>
		                    <li class="d-flex justify-content-between">Сб - вс : <span>10:00 - 17:00</span></li>
		                </ul>
					</div>
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Звоните</span>
						<h4 class="mb-3">+7-000-000-00-00</h4>
						<p>Получите постоянную поддержку в экстренных случаях.Мы внедрили принцип семейной медицины.Свяжитесь с нами по любым срочным вопросам.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section about">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 col-sm-6">
				<div class="about-img">
					<img src="images/about/img-1.jpg" alt="" class="img-fluid">
					<img src="images/about/img-2.jpg" alt="" class="img-fluid mt-4">
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="about-img mt-4 mt-lg-0">
					<img src="images/about/img-3.jpg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="about-content pl-4 mt-4 mt-lg-0">
					<h2 class="title-color">
						Личная гигиена <br>и здоровый образ жизни</h2>
					<p class="mt-4 mb-5">Мы предоставляем лучшие ведущие медицинские услуги, не требующие особых усилий</p>

					<a href="/service.php" class="btn btn-main-2 btn-round-full btn-icon">Услуги<i class="icofont-simple-right ml-3"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3">15</span>
						<p>Пациенты</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3">16</span>+
						<p>Опытные врачи</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3">0</span>
						<p>Филиалов</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section service gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Отмеченный наградами уход за пациентами</h2>
					<div class="divider mx-auto my-4"></div>
					<p>текст</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-laboratory text-lg"></i>
						<h4 class="mt-3 mb-3">Услуги лаборатории</h4>
					</div>

					<div class="content">
						<p class="mb-4">Общий анализ крови</p>
						<p class="mb-4">Биохимический анализ</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-heart-beat-alt text-lg"></i>
						<h4 class="mt-3 mb-3">Заболевание сердца</h4>
					</div>
					<div class="content">
						<p class="mb-4">Аритмология</p>
						<p class="mb-4">Кардиология</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-crutch text-lg"></i>
						<h4 class="mt-3 mb-3">Хирургия</h4>
					</div>
					<div class="content">
						<p class="mb-4">Травматология</p>
						<p class="mb-4">Урология</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-brain-alt text-lg"></i>
						<h4 class="mt-3 mb-3">Неврология</h4>
					</div>
					<div class="content">
						<p class="mb-4"></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-item mb-4">
					<div class="icon d-flex align-items-center">
						<i class="icofont-dna-alt-1 text-lg"></i>
						<h4 class="mt-3 mb-3">Гинекология</h4>
					</div>
					<div class="content">
						<p class="mb-4"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	<? require_once 'page/includes/navbarf.php' ?>
</body>
</html>