<?php

namespace app\models;

class User extends AppModel
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['name'],
            ['email'],
            ['address'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ]
    ];

    public function checkUnique()
    {
        $user = \R::findOne('user', 'login = ? OR email = ?', [$this->attributes['login'], $this->attributes['email']]);
        if ($user) {
            if ($user->login = $this->attributes['login']) {
                $this->errors['unique'][] = 'This login is already taken';
            }
            if ($user->email = $this->attributes['email']) {
                $this->errors['unique'][] = 'This email is already taken';
            }
            return false;
        }
        return true;
    }

}