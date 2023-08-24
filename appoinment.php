<? 	session_start(); ?>
<? require_once 'page/includes/head.php' ?>
<body id="top">
<? require_once 'page/includes/navbar.php' ?>
	


<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-5 text-lg">Консультация бесплатна для всех</h1>

       
        </div>
      </div>
    </div>
  </div>
</section>

<section class="appoinment section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
          <div class="mt-3">
            <div class="feature-icon mb-3">
              <i class="icofont-support text-lg"></i>
            </div>
             <span class="h3">Экстренная консультацией прямо сейчас!</span>
              <h3 class="text-color mt-3">+7-900-000-00-00 </h3>
          </div>
      </div>

      <div class="col-lg-8">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Запишитесь на консультацию</h2>
            <p class="mb-4"></p>
               <form id="#" class="appoinment-form" method="POST" action="/app/record.php">
                    <div class="row">
                  

                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="data" id="data" type="date" class="form-control" required  value="2023-06-15"  min="2005-01-01" >
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="time" id="time"  type="time" class="form-control" required  min="05:00" max="23:00">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control" required  placeholder="Ваше Ф.И.О">
                            </div>
                        </div>
						<div class="col-lg-6">
                            <div class="form-group">
                                <input name="doctor" id="doctor" type="text" class="form-control" required  placeholder="Ф.И.О Доктора">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone" id="phone" type="text" class="form-control" value="7" required   placeholder="Номер телефона">
								<small>Format: +79000000000</small>
							</div>
                        </div>
                    </div>
					<input type="text" name="type" value="add" style="display:none"><br>
                    <div class="form-group-2 mb-4">
                        <textarea name="desc" id="desc" class="form-control" rows="6" required  placeholder="Введите сюда наименование услуги по которой хотите проконсультироваться"></textarea>
                    </div>
					<button type="submit" name="do_signup" class="btn btn-main btn-round-full">Запись на консультацию</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<? require_once 'page/includes/navbarf.php' ?>

  </body>
  </html>