<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController
{
    public function signupAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if ($user->save('user')) {
                    $_SESSION['success'] = 'Successful registration';
                } else {
                    $_SESSION['error'] = 'Error';
                }
            }
            redirect();
        }
        $this->setMeta('Registration');
    }

    public function loginAction()
    {

    }

    public function logoutAction()
    {

    }


}