<?php

namespace app\controllers;

class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);
        if (!$product) {
            throw new \Exception('Page not found', 404);
        }

        //breadcrumbs

        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product->id]);

        $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);

        // modification

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery'));
    }
}