<?php

class Type extends CoreModel{

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

    public function find($typeId){

        $database = Database::getPDO();
        $sql = 'SELECT * FROM type WHERE id = '.$typeId;
        $statement = $database->query($sql);
        $result = $statement->fetchObject('Type');

        return $result;
    }

    public function findAllForFooter(){
        $database = Database::getPDO();
        $sql = 'SELECT * FROM type WHERE footer_order > 0 ORDER BY footer_order';
        $statement = $database->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Type');

        return $result;

    }
}