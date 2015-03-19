<h1>Possibilités multiples</h1>
<div align="center">
	<a href="index.php?page=artReadMulti&artAjout">Ajouter un article</a><br><br>
</div>



<?php






//VALIDATION DE L'AJOUT EN BDD
if (isset($_GET['artAjout'])&&($_GET['artAjout']=="GO")) {

	if (isset($_POST['submit'])) {
        
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        
        $article = new Article();
        //$article->id = $id;
        $article->titre = $titre;
        $article->contenu = $contenu;
        
        $art = new ArticleRepository($dbh) ;   
        $articleAjout = $art->ajoutArticle($article); //var_dump($articleAjout); exit;
        
        
        /*
        $art = new ArticleRepository($dbh) ;   
        $articleAjout = $art->ajoutArticle($titre, $contenu); //var_dump($articleAjout); exit;
        */
        
        if ($articleAjout) {echo "<br><div align='center'>Ajout de l'article effectué.</div><br>";}
        }        

}


//Ajout DE L'ARTICLE (Affichele formulaire)
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
    
    $art = new ArticleRepository($dbh) ;   
    $articleSupr = $art->suprArticle($id); // var_dump($articleSupr); exit;
    
  	if ($articleSupr) {echo "<br><div align='center'>Suppression de l'article ".$id." effectuée.</div><br>";}

  	//$conn = null;        // Disconnect
  }


//MODIFICATION DE L'ARTICLE
if (isset($_GET['artModID'])) {
	
	if (isset($_POST['submit'])) {

		$id = (int)$_GET['artModID'];
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];

        $art = new ArticleRepository($dbh) ;   
        $articleModif = $art->modifArticle($id, $titre, $contenu); // var_dump($articleSupr); exit;
    
	  	if ($articleModif) {echo "<br><div align='center'>Modification de l'article ".$id." effectuée.</div><br>";}
	}

	else {


			$id = (int)$_GET['artModID'];
            $art = new ArticleRepository($dbh) ;   
            $article = $art->getArticle($id);  //var_dump($article);


            if ($article) {
                
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
                    $texte .=  '<tr><td>'.$article->id.'</td>';
                    $texte .=  '<td><input type="text" name="titre" value="'.$article->titre.'"></td>';
                    $texte .=  '<td><textarea name="contenu" class="editor">'.$article->contenu.'</textarea></td></tr>';
                       
                    $texte .= "

                        </tbody>
                    </table>

                    <input type='submit' value='Modifier' name='submit'>
                    <br><br>
                    </form>
                    </div>
                    ";


                    echo $texte;

            }
            else echo "Aucun article correspondant.";
                
                
            }




	}


 

//AFFICHE LES DIFFERENTS ARTICLES EN BDD  
if ($_GET['page']=="artReadMulti") {

    $art = new ArticleRepository($dbh) ;   
    $articles = $art->getArticles();  //var_dump($article);

if ($articles)	{
    
    $desresultats = true;
    
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
    
    foreach ($articles as $article) {



						$texte .=  '<tr><td>'.$article->id.'</td>';
				        $texte .=  '<td>'.$article->titre.'</td>';
				        $texte .=  '<td>'.nl2br($article->contenu).'</td>';
				        $texte .=  '<td><input type=button onClick="parent.location=\'index.php?page=artReadMulti&artModID='.$article->id.'\'" value=\'Modifier\'></td>';
				        $texte .=  '<td><input type=button onClick="parent.location=\'index.php?page=artReadMulti&artDelID='.$article->id.'\'" value=\'Supprimer\'></td></tr>';
				
					


			
        }
        
    $texte .= "

        </tbody>
    </table>
    </div>
    ";


    echo $texte;
        
	}		
}  
  
  


?>


