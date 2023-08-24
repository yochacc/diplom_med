<?
if(isset($_POST['search_pr'])){

	if(!empty($_POST['search_pr'])){
		header('Location: /maptur.php?search='.$_POST['search_pr']);
	}else{
		header('Location: /maptur.php');
	}

}else if(isset($_POST['search_cm'])){

	if(!empty($_POST['search_cm'])){
		header('Location: /page/companies.php?search='.$_POST['search_cm']);
	}else{
		header('Location: /page/companies.php');
	}

}else{
	header('Location: /');
}