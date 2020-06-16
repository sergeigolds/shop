<?php

namespace app\controllers;
//use ishop\App;

use ishop\Cache;

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
        $names = ['Admin', 'Admin1', 'Admin2'];
        $cache = Cache::instance();
        //$cache->set('test', $names);
        //$cache->delete('test');
        $data = $cache->get('test');
        if (!$data) {
            $cache->set('test', $names);
        }
        debug($data);
        $this->set(compact('name', 'age', 'names', 'posts'));
    }


}