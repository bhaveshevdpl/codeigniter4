<?php

namespace App\Validation;
use App\Models\UsersModel;

class VerifyPasswordRules
{
    public function verifyPassword(string $str, string $fields, array $data){
        $model = new UsersModel();
        $user = $model->where('id', session()->get('user_id'))->first();
        if(!$user){
          return false;
        }
        return password_verify($data['password'], $user['password']);
    }
}
