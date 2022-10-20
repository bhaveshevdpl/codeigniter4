<?php

namespace App\Validation;
use App\Models\Store\Employees\RolesModel;
class RoleRules
{
    public function __construct(){
        $this->role = new RolesModel();
        $this->encryption = \Config\Services::encrypter();
    }

    public function validateUniqueRole(string $str, string $fields, array $data){

        if(isset($data['pk'])){
            $id = intval($this->encryption->decrypt(base64_decode(str_replace(array('-', '_', '~'), array('+', '/', '='), $data['pk']))));
            $role = $this->role
            ->where('store_id', session()->get('parent_store_id'))
            ->where('id !=', $id)
            ->where('name', strtolower(trim($data['value'])))
            ->where('deleted_at', NULL)
            ->first();
            return (is_null($role) || empty($role)) ? true : false;
        }
        $role = $this->role
            ->where('store_id', session()->get('parent_store_id'))
            ->where('name', strtolower(trim($data['role_name'])))
            ->where('deleted_at', NULL)
            ->first();
        return (is_null($role) || empty($role)) ? true : false;
    }
}
