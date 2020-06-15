<?php

namespace app\controllers;
//use ishop\App;

class MainController extends AppController
{

    public function indexAction()
    {
        //echo __METHOD__;
        $this->setMeta('Home Page', 'description...', 'keywords...');
        //$this->setMeta(App::$app->getProperty('shop_name'), 'description...', 'keywords...');
        $name = 'Admin';
        $age = 30;
        $this->set(compact('name', 'age'));
    }


}