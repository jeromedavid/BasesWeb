<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleRepository
 *
 * @author Jérôme DAVID
 */
class ArticleRepository {

    private $db;
    
    public function __construct($dbh) {
        $this->db=$dbh;
    }
    
    
    /**
     * 
     * @param string $titre & string $contenu of the Article
     * @return number (by counting) : 0=none & 1=succeed
     */
    /*
    public function ajoutArticle($titre,$contenu) {

        $requete = "INSERT INTO article (titre,contenu) VALUES ('$titre','$contenu')";
        
        $resultat=$this->db->exec($requete);
        
        return $resultat;
        
    }     
    */
    public function modifArticle($id,$titre,$contenu) {

        $requete = "UPDATE article SET titre='$titre',contenu='$contenu' WHERE id=".$id;
        $resultat=$this->db->exec($requete);
        
        return $resultat;
        
    }     
    
    public function getArticle($id) {


        $requete = "SELECT * FROM article WHERE id=".$id;
        $resultats=$this->db->query($requete);
        $article = $resultats->fetch(PDO::FETCH_OBJ);
        
        
        
        return $article;
        
    } 
    
    public function getArticles() {


        $requete = "SELECT * FROM article";
        $resultats=$this->db->query($requete);
        $articles = $resultats->fetchall(PDO::FETCH_OBJ);
        
        return $articles;
        
    }  
    
    /**
     * 
     * @param int $id Id of the Article
     * @return number (by counting) : 0=none & >=1 if succeed
     */
    public function suprArticle($id) {


        $requete = "DELETE FROM article WHERE id=".$id;
        $resultat=$this->db->exec($requete);
        
        return $resultat;
        
    }     

    /**
     * 
     * @param string $titre & string $contenu of the Article
     * @return number (by counting) : 0=none & 1=succeed
     */   
    public function ajoutArticle(Article $article){
        
	$requete = "INSERT INTO article (titre,contenu) VALUES (:titre,:contenu)";
    $statement = $this->db->prepare($requete);
    $statement->bindParam(":titre",$article->titre);
    $statement->bindParam(":contenu",$article->contenu);
    $resultat = $statement->execute();
    
    return $resultat;
    
    }
    
}
