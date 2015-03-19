<?php


if (isset($_GET['artID'])) {
	
	$id = (int)$_GET['artID'];
	$texte = "";

    $art = new ArticleRepository($dbh) ;   
    $article = $art->getArticle($id);  //var_dump($article);

    
    if ($article) {
    
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


						$texte .=  '<td>'.$article->id.'</td>';
				        $texte .=  '<td>'.$article->titre.'</td>';
				        $texte .=  '<td>'.$article->contenu.'</td>';


			$texte .= "
					</tr>
				</tbody>
			</table>
			</div>
			";


			echo $texte;

    }
    else echo "Aucun article correspondant.";
}

