<?php

namespace Oshop\Controllers;

use Oshop\Models\Category;
use Oshop\Models\Product;

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

        $product = new Product;
        $productToDisplay = $product->find($productId);

        $categoryModel = new Category;
        $category = $categoryModel->find($productToDisplay->getCategoryId());

        $this->show('product', [
            'category' => $category,
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
