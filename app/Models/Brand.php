<?php

namespace Oshop\Models;

class Brand extends CoreModel{

    private $footer_order;

    /**
     * Get the value of footer_order
     */ 
    public function getFooterOrder()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooterOrder($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }

    public function find($brandId){

        $database = \Database::getPDO();
        $sql = 'SELECT * FROM brand WHERE id = '.$brandId;
        $statement = $database->query($sql);
        $result = $statement->fetchObject('Oshop\Models\Brand');

        return $result;
    }

    public function findAllForFooter(){
        $database = \Database::getPDO();
        $sql = 'SELECT * FROM brand WHERE footer_order > 0 ORDER BY footer_order';
        $statement = $database->query($sql);
        $result = $statement->fetchAll(\PDO::FETCH_CLASS, 'Oshop\Models\Brand');

        return $result;

    }

    public function findAllByBrand($brandId){

        $pdo = \Database::getPDO();
        $sql = 'SELECT * FROM product WHERE brand_id = ' . $brandId;
        $statement = $pdo->query($sql);

        $result = $statement->fetchAll(\PDO::FETCH_CLASS, 'Oshop\Models\Product');

        return $result;
    }
}