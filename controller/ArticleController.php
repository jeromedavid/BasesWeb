<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * ArticleController is the controller of the articles
 *
 * @author Jérôme DAVID
 */
class ArticleController {
    //put your code here
    
    private $repo;
    
    public function __construct($repo) {
        $this->repo = $repo;
    }
    
    /**
     * Index will show every article into a list
     * 
     * @return string HTML code of the content page
     */
    
    public function indexAction() {
        //on forge la requete SQL
        $articles = $this->repo->getAll();
        
        if ($articles) {
            $nbRows = count($articles);
            
            
            
            
            
            
            
        }
        
        
     
    }
    
    
    public function getAll() {
        
    }
    
    
    
    
    
    
}
