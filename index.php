<?php 
	include 'db.php';
	session_start();
	if($_SESSION == null)
	{
		$photo = '';
		$infoCompte = '';
		$logOut = '';
	}else{
		$photo = $_SESSION['photo'];
		$infoCompte = 'Mon Compte';
		$logOut = 'LogOut';
	}

	$activeAccueil = 'active';
	$activeUser = '';
	$activeEtudiant = '';
	$activeCompte = '';
	$activeFormation = '';
	$activeMatiere = '';
	$activeNote = '';


	if(isset($_GET['page'])){
		$currentPage = $_GET['page'];
		switch ($currentPage){
			case "accueil":
				$activeAccueil = 'active';
			break;
			case "etudiants":
				$activeEtudiant = 'active';
				$activeAccueil = '';
			break;
			case "formations":
				$activeFormation = 'active';
				$activeAccueil = '';
			break;
			case "matieres":
				$activeMatiere = 'active';
				$activeAccueil = '';
			break;
			case "notes":
				$activeNote = 'active';
				$activeAccueil = '';
			break;
			case "login":
				$activeAccueil = '';
			break;
			case "utilisateurs":
				$activeUser = 'active';
				$activeAccueil = '';
			break;
			case "comptes":
				$activeCompte = 'active';
				$activeAccueil = '';
			break;
			default:
				$activeAccueil = 'active';
		}		
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Projet</title>
	<link rel="stylesheet" type="text/css" href="./static/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./static/style.css">
	<link rel="icon" type="image/x-icon" href="./static/image/logoEtudiant.jpg">
	<script src="https://use.fontawesome.com/11d43ad618.js"></script>
</head>

<body class="bg-light">

	<nav class="navbar navbar-expand-lg navbar-light menu">
		<a class="navbar-brand text-white font-weight-bold ml-5" href="?page=accueil">GEST_NOTES</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link item1 <?php echo($activeAccueil);?>" href="?page=accueil">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link item1 <?php echo($activeFormation); ?>" href="?page=formations">Formations</a>
				</li>
				<li class="nav-item">
					<a class="nav-link item1 <?php echo($activeMatiere); ?>" href="?page=matieres">Matieres</a>
				</li>
				<li class="nav-item">
					<a class="nav-link item1 <?php echo($activeNote); ?>" href="?page=notes">Notes</a>
				</li>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link item1 dropdown-toggle <?php echo($activeEtudiant); ?> <?php echo($activeUser); ?> <?php echo($activeCompte); ?>" href="#" id="navbarDropdown"
							role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Administration
						</a>
						<div class="dropdown-menu menu1" aria-labelledby="navbarDropdown">
							<a class="dropdown-item drop1" href="?page=etudiants">Etudiants</a>
							<a class="dropdown-item drop1" href="?page=utilisateurs">utilisateurs</a>
							<div class="dropdown-divider ml-3"></div>
							<a class="dropdown-item drop1" href="?page=comptes">Comptes</a>
						</div>
					</li>
				</ul>
			</ul>
			<ul class="navbar-nav ml-auto mr-5">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="./static/image/<?php echo ($photo != '')?$photo:'avatar.jpg'?>" alt=""
							class="rounded-circle" width="30" height="30">
					</a>
					<div class="dropdown-menu menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item drop1" href="#"><?php echo ($infoCompte != '')?$infoCompte:'' ?></a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item drop1"
							href="pages/connexion/logOut.php"><?php echo ($logOut != '')?$logOut:'' ?></a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container my-3 ">
		<?php 


		if (!isset($_GET['page']) ) {
			$page = "login";

		}elseif(empty($_GET['page'])){
			$page = "login";
		}else{
			$page =$_GET['page'];		
		}

		switch ($page){
			case "login":
				require 'pages/connexion/login.php';
			break;
			case "accueil":
				require 'pages/accueil.php';
			break;
			case "etudiants":
				require 'pages/etudiant/listEtudiant.php';
			break;
			case "comptes":
				require 'pages/compte/listCompte.php';
			break;
			case "formations":
				require 'pages/formation/listFormation.php';
			break;
			case "matieres":
				require 'pages/matiere/listMatiere.php';
			break;
			case "notes":
				require 'pages/note/listNote.php';
			break;
			case "utilisateurs":
				require 'pages/utilisateur/listUser.php';
			break;
			case "login":
				require 'pages/connexion/login.php';
			break;
			default:
				require 'pages/connexion/login.php';
		}
	 ?>
	</div>

</body>
<script type="text/javascript" src="./static/jquery/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./static/bootstrap/js/bootstrap.min.js"></script>

</html>