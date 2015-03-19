<?php


	require("inc/db_connect.php");
	
	//print_r($dbh);



	$maPage = "";
	$changerbackground = false;
	$rep_inc = "/inc/";

	if (isset($_GET["page"])&&($_GET["page"]!=""))
	{

		$maPage = $_GET["page"];

		switch($maPage)
		{
		    case 'home' : $maPage = $rep_inc."home.php"; $titrePage="Page d'accueil";
		    	break;
		    case 'details': $maPage = $rep_inc."details.php"; $titrePage = "Page de détails";
		    	break;  

		    case 'sessionsReg': $maPage = $rep_inc."sessions_show.php"; $titrePage = "Sessions reg";
		    	break;  

		    case 'formulaire': $maPage = $rep_inc."formulaire.php"; $titrePage = "Formulaire d'enregistrement"; $changerbackground = true;
		    	break; 

		    case 'formReg': $maPage = $rep_inc."formulaireReg.php"; $titrePage = "Formulaire enregistré";
		    	break; 		    	

		    case 'artRead': $maPage = $rep_inc."bdd_afficher.php"; $titrePage = "Afficher Article";
		    	break; 	

		    case 'artReadMulti': $maPage = $rep_inc."bdd_afficher_multi.php"; $titrePage = "Afficher Article Multiple";
		    	break; 			    	

		    case 'sessions': $maPage = $rep_inc."sessions.php";  $titrePage = "Sessions result";
		    	break;     	
		    default :
		        //header("Location: index.php");exit;
		    break;
		}
	}
	else {$maPage = $rep_inc."home.php";$titrePage="Page d'accueil";};


	if ($changerbackground) { echo "<script>$('div.sectionMain').css('background-color','#F7F7F7')</script>"; }


?>


<!DOCTYPE html>
<html>



<head>

	<meta charset="utf-8">
	<title><?php echo $titrePage; ?></title>
	<link rel="stylesheet" type="text/css" href="Plugin/Pikaday-master/css/pikaday.css">
	<link rel="stylesheet" type="text/css" href="Plugin/TE/jquery-te-1.4.0.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400' rel='stylesheet' type='text/css'>

	<script src="Plugin/jquery.js"></script>
	<script src="Plugin/TE/jquery-te-1.4.0.min.js"></script>
	
	



</head>

<body style="background:#272C48; font-family: 'Raleway', sans-serif; font-size:14px">


<div class="sectionHeader">
	<?php include ($rep_inc."header.php"); ?>
</div>

<div class="sectionMain">

<?php include $maPage; ?>


</div>

<div class="sectionFooter">
	<?php include ($rep_inc."footer.php");   ?>
</div>





	<script>

		$("textarea").jqte();

	</script>
</body>
</html>

