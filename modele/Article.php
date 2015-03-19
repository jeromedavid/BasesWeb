<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Article is BO to handle articles
 *
 * @author Jérôme DAVID
 */
class Article {
    /**
     *
     * @var int $id 
     */
    public $id;
    public $titre;
    public $contenu;
    
    /*
    public function __construct($id,$titre,$contenu) {
        echo $this->id; //affiche le titre de l'objet
        echo $this->titre;
        echo $this->contenu;
    }
    */
    
    
   function getId() {
       return $this->id;
   }

   function getTitre() {
       return $this->titre;
   }

   function getContenu() {
       return $this->contenu;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setTitre($titre) {
       $this->titre = $titre;
   }

   function setContenu($contenu) {
       $this->contenu = $contenu;
   }


    
    
    
}
