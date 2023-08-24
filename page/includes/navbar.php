



<? if(empty($_SESSION['login'])){ ?>

	

  <header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@proj.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>г.Чебоксары</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							<span>Звоните сейчас : </span>
							<span class="h4">+7-000-000-00-00</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="/">
			  	<img src="/images/logo.png" alt="" class="img-fluid">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="/">Главная</a>
			  </li>
			  <li class="nav-item"><a class="nav-link" href="/appoinment.php">Консультация</a></li>
			    <li class="nav-item"><a class="nav-link" href="/service.php">Услуги</a></li>
				<li class="nav-item"><a class="nav-link" href="/doctor.php">Врачи</a></li>
			  


			 
			   <li class="nav-item"><a class="modal-btn" href="/auth.php">Вход</a></li>
			</ul>
		  </div>
		</div>
	</nav>
</header>



<? }else{ ?>


  <header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@proj.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>г.Чебоксары</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							<span>Звоните сейчас : </span>
							<span class="h4">+7-000-000-00-00</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="/">
			  	<img src="/images/logo.png" alt="" class="img-fluid">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="/">Главная</a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="/appoinment.php">Консультация</a></li>
			    <li class="nav-item"><a class="nav-link" href="/service.php">Услуги</a></li>
				<li class="nav-item"><a class="nav-link" href="/doctor.php">Врачи</a></li>
        <? echo $_SESSION['doctor']?'<li class="nav-item"><a class="nav-link"  href="/page/doctor.php">Панель - Врача</a></li>':''?>
		<li class="nav-item"><a class="nav-link" href="/profile.php">Профиль</a></li>
			   <li class="nav-item"><a class="nav-link" href="/app/logout.php">Выход</a></li>
			</ul>
		  </div>
		</div>
	</nav>
</header>




	


<? } ?>

