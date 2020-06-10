<?php

class CatalogController extends CoreController{

    public function category($params){

        $categoryId = $params['categoryId'];

        $this->show('category', [
            'categoryId' => $categoryId
        ]);
    }

    public function type($params){

        $typeId = $params['typeId'];

        $this->show('type', [
            'typeId' => $typeId
        ]);
    }

    public function product($params){

        $productId = $params['productId'];

        $product = new Product();
        $productToDisplay = $product->find($productId);

        $this->show('product', [
            'productId' => $productId,
            'product' => $productToDisplay
        ]);
    }

    public function brand($params){

        $brandId = $params['brandId'];

        $this->show('brand', [
            'brandId' => $brandId
        ]);
    }

}
