<?php


if (isset($_GET['artID'])) {
	
	$id = (int)$_GET['artID'];

	$requete = "SELECT * FROM article WHERE id=".$id;


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
				</thead>
				<tbody>
					<tr>";

				if ( $resultat = $resultats->fetch() )
				{
						$texte .=  '<td>'.$resultat['id'].'</td>';
				        $texte .=  '<td>'.$resultat['titre'].'</td>';
				        $texte .=  '<td>'.nl2br($resultat['contenu']).'</td>';
				
					$desresultats = true;


				}
				//$resultats->closeCursor();

			$texte .= "
					</tr>
				</tbody>
			</table>
			</div>
			";


			if ($desresultats) {echo $texte;}
			else {echo "Aucuns articles en résulats.";}


			/*
				$resultats->setFetchMode(PDO::FETCH_OBJ);



			echo "
			<div align='center'>
			<table class='flat-table flat-table-3'>
				<thead>
					<th>Article</th>
					<th>Titre</th>
					<th>Contenu</th>
				</thead>
				<tbody>
					<tr>";

				while( $resultat = $resultats->fetch() )
				{
						echo '<td>'.$resultat->id.'</td>';
				        echo '<td>'.$resultat->titre.'</td>';
				        echo '<td>'.$resultat->contenu.'</td>';
				}
				$resultats->closeCursor();

			echo "
					</tr>
				</tbody>
			</table>
			</div>
			";

			*/
	}		
}


?>
