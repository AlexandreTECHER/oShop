<?php

class Product extends CoreModel
{

    private $description;
    private $picture;
    private $price;
    private $rate;
    private $brand_id;
    private $category_id;
    private $type_id;
    private $brand_name;
    private $type_name;

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    /**
     * Get the value of category_id
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * Get the value of type_id
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    /**
     * Get the value of brand_name
     */
    public function getBrandName()
    {
        return $this->brand_name;
    }

    /**
     * Get the value of type_name
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    public function find($productId)
    {

        $pdo = Database::getPDO();
        $sql = "
        SELECT 
        `product`.*,
        `brand`.`name` AS 'brand_name'
        FROM `product`
        INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id` 
        WHERE `product`.`id`= {$productId}
        ";
        $statement = $pdo->query($sql);
        $result = $statement->fetchObject('Product');

        return $result;
    }

    public function findAll()
    {

        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM product';
        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function findAllByCategory($categoryId)
    {

        $pdo = Database::getPDO();
        $sql = "
            SELECT
            `product`.*,
            `type`.`name` AS 'type_name'
            FROM `product`
            INNER JOIN `type` ON `product`.`type_id` = `type`.`id` 
            WHERE `category_id` = {$categoryId}
        ";
        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');

        return $result;

    }

    public function findAllByBrand($brandId){

        $pdo = Database::getPDO();
        $sql = "
        SELECT
        `product`.*,
        `type`.`name` AS 'type_name'
        FROM `product`
        INNER JOIN `type` ON `product`.`type_id` = `type`.`id` 
        WHERE `brand_id` = {$brandId} 
        ";
        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');

        return $result;
    }

    public function findAllByType($typeId){
        $pdo = Database::getPDO();
        $sql = "
        SELECT 
        `product`.*,
        `type`.`name` AS 'type_name'
        FROM `product` 
        INNER JOIN `type` ON `product`.`type_id` = `type`.`id` 
        WHERE `type_id` = {$typeId} 
        ";
        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');

        dd($result);
    }
}
