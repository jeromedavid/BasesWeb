<h1>Possibilités multiples</h1>
<div align="center">
	<a href="index.php?page=artReadMulti&artAjout">Ajouter un article</a><br><br>
</div>



<?php


//VALIDATION DE L4AJOUT EN BDD
if (isset($_GET['artAjout'])&&($_GET['artAjout']=="GO")) {

	//echo "ENTREE DANS AJOUT 1";

	if (isset($_POST['submit'])) {
	$requete = "INSERT INTO article (titre,contenu) VALUES (:titre,:contenu)";
	//echo "ENTREE DANS AJOUT 1 BIS";


	$statement = $dbh->prepare($requete);
	$statement->bindParam(":titre",$_POST['titre']);
	$statement->bindParam(":contenu",$_POST['contenu']);
	$result = $statement->execute();


	//echo $result;


  	//$resultat = $dbh->query($requete);

  	if ($result) {echo "<br><div align='center'>Ajout de l'article effectué.</div><br>";}
	}
}


//Ajout DE L'ARTICLE

if (isset($_GET['artAjout'])) {

if (($_GET['artAjout']!="GO")) {

							$texte = "
							<div align='center'>
							<form action='index.php?page=artReadMulti&artAjout=GO' method='post'>
							<table class='flat-table flat-table-2'>
								<thead>
									<th>Titre</th>
									<th>Contenu</th>
								</thead>
								<tbody>
									";
				
								        $texte .=  '<tr><td><input type="text" name="titre" value=""></td>';
								        $texte .=  '<td><textarea name="contenu"></textarea></td></tr>';

							$texte .= "
									
								</tbody>
							</table>

							<input type='submit' value='Créer' name='submit'>
							<br><br>
							</form>
							</div>
							";

			echo $texte;
			

}
}

//SUPPRESSION DE L'ARTICLE
if (isset($_GET['artDelID'])) {
	
	$id = (int)$_GET['artDelID'];

	$requete = "DELETE FROM article WHERE id=".$id;

	//$resultats=$dbh->query($requete);

  	$count = $dbh->exec($requete);

  	//echo $count;

  	if ($count ==true) {echo "<br><div align='center'>Suppression de l'article ".$id." effectuée.</div><br>";}

  	//$conn = null;        // Disconnect
  }


//MODIFICATION DE L'ARTICLE
if (isset($_GET['artModID'])) {
	


	if (isset($_POST['submit'])) {

		$id = (int)$_GET['artModID'];

		$requete = "UPDATE article SET titre=:titre,contenu=:contenu WHERE id=".$id;

		//echo $requete;


		$statement = $dbh->prepare($requete);
		$statement->bindParam(":titre",$_POST['titre']);
		$statement->bindParam(":contenu",$_POST['contenu']);
		$result = $statement->execute();

	  	if ($result) {echo "<br><div align='center'>Modification de l'article ".$id." effectuée.</div><br>";}
	}

	else {


			$id = (int)$_GET['artModID'];

			$requete = "SELECT * FROM article WHERE id=".$id;


					$resultats=$dbh->query($requete);

					$desresultats = false;
					$texte = "";
					//print_r($resultats); exit;


				if ($resultats)	{

							$texte = "
							<div align='center'>
							<form action='index.php?page=artReadMulti&artModID=".$id."' method='post'>
							<table class='flat-table flat-table-2'>
								<thead>
									<th>Article</th>
									<th>Titre</th>
									<th>Contenu</th>
								</thead>
								<tbody>
									";

								if ( $resultat = $resultats->fetch() )
								{
										$texte .=  '<tr><td>'.$resultat['id'].'</td>';
								        $texte .=  '<td><input type="text" name="titre" value="'.$resultat['titre'].'"></td>';
								        $texte .=  '<td><textarea name="contenu" class="editor">'.$resultat['contenu'].'</textarea></td></tr>';
								
									$desresultats = true;


								}
								//$resultats->closeCursor();

							$texte .= "
									
								</tbody>
							</table>

							<input type='submit' value='Modifier' name='submit'>
							<br><br>
							</form>
							</div>
							";


						}

			if ($desresultats) {echo $texte;}
			else {echo "Aucuns articles en résulats.";}



	}


  }



//AFFICHE LES DIFFERENTS ARTICLES
if ($_GET['page']=="artReadMulti") {

	$requete = "SELECT * FROM article";


	$resultats=$dbh->query($requete);

	$desresultats = false;
	$texte = "";
	//print_r($resultats); exit;


if ($resultats)	{

			$texte = "
			<div align='center'>
			<table class='flat-table flat-table-3'>
				<thead>
					<th>Article</th>
					<th>Titre</th>
					<th>Contenu</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					";

				while ( $resultat = $resultats->fetch() )
				{
						$texte .=  '<tr><td>'.$resultat['id'].'</td>';
				        $texte .=  '<td>'.$resultat['titre'].'</td>';
				        $texte .=  '<td>'.nl2br($resultat['contenu']).'</td>';
				        $texte .=  '<td><input type=button onClick="parent.location=\'index.php?page=artReadMulti&artModID='.$resultat['id'].'\'" value=\'Modifier\'></td>';
				        $texte .=  '<td><input type=button onClick="parent.location=\'index.php?page=artReadMulti&artDelID='.$resultat['id'].'\'" value=\'Supprimer\'></td></tr>';
				
					$desresultats = true;


				}
				//$resultats->closeCursor();

			$texte .= "
					
				</tbody>
			</table>
			</div>
			";


			if ($desresultats) {echo $texte;}
			else {echo "Aucuns articles en résulats.";}

	}		
}


?>


