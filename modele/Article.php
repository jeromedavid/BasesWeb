<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author Jérôme DAVID
 */
class Article {
    //put your code here
    public $article;
    public $titre;
    public $contenu;
    
    public function afficherArticle() {
        echo $this->titre; //affiche le titre de l'objet
    }
    
    
}