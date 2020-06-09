<?php

class CatalogController{

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


    private function show($viewName, $viewData = []){

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . "/../views/{$viewName}.tpl.php";
        require_once __DIR__ . '/../views/footer.tpl.php';

    }
}
