<?php

namespace app\controllers;
//use ishop\App;

class MainController extends AppController
{

    public function indexAction()
    {
        $posts = \R::findAll('test');
        $post = \R::findOne('test', 'id = ?', [2]);
        $this->setMeta('Home Page', 'description...', 'keywords...');
        //$this->setMeta(App::$app->getProperty('shop_name'), 'description...', 'keywords...');
        $name = 'Admin';
        $age = 30;
        $this->set(compact('name', 'age', 'posts'));
    }


}