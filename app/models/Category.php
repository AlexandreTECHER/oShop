<?php

class Category extends CoreModel{

    private $subtitle;
    private $picture;
    private $home_order;

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }


    public function find($categoryId){

        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM category WHERE id = '.$categoryId;
        $statement = $pdo->query($sql);
        $result = $statement->fetchObject('Category');
        
        return $result;
    }

    public function findAllForHome(){
        
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM category WHERE footer_order > 0 ORDER BY footer_order';
        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Category');

        return $result;
    }
}