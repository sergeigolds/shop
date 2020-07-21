<?php

namespace app\models;

use ishop\App;

class Cart extends AppModel
{
    public function addToCart($product, $qty = 1, $mod = null)
    {
        if (!isset($_SESSION['cart.currency'])) {
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }
    }
}