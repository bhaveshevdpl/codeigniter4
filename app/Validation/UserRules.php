<?php

namespace App\Validation;
use App\Models\UsersModel;
use App\Models\Customers\CustomersManage\CustomersModel;
use App\Models\Store\ModuleConfigurations\ManufacturerModel;
use App\Models\Store\ModuleConfigurations\DeviceModel;
class UserRules
{
    public function validateUser(string $str, string $fields, array $data){
        $model = new UsersModel();
        $user = $model->where('email', $data['email'])->first();
        if(!$user){
          return false;
        }
        return password_verify($data['password'], $user['password']);
    }
    //check email exists
    public function checkEmail(string $str, string $fields, array $data){
        $model = new UsersModel();
        $user = $model->where('email', $data['email'])->first();
        if(!$user){
          return true;
        }
        return false;
    }
    public function checkPhone(string $str, string $fields, array $data){
        $model = new UsersModel();
        $user = $model->where('phone_number', $data['phone_number'])->first();
        if(!$user){
          return true;
        }
        else{
            return false;   
        }
    }
    //check email exists for forgot password
    public function checkEmailExist(string $str, string $fields, array $data){
        $model = new UsersModel();
        $user = $model->where('email', $data['email'])->first();
        if(!$user){
            return false;
        }else{
            return true;
        }
    }
    //for customers
   /* public function customerCheckPhone(string $str, string $fields, array $data){
        $model = new CustomersModel();
        if(isset($data['id']) && isset($data['id'])!=''){
            $model->where('id !=', $data['id']);   
        }
        if(isset($data['primary_phone']) && $data['primary_phone']!=''){
            $user = $model->where('primary_phone', $data['primary_phone'])->first();
            if(!$user){  return true;  }
            else{ return false;  }
        }else if(isset($data['new_primary_phone']) && $data['new_primary_phone']!=''){
            $user = $model->where('primary_phone', $data['new_primary_phone'])->first();
            if(!$user){  return true;  }
            else{ return false;  }
        }else{
            return true;
        }
    }
    //check email exists
    public function customerCheckEmail(string $str, string $fields, array $data){
        $model = new CustomersModel();
        if(isset($data['id']) && isset($data['id'])!=''){
            $model->where('id !=', $data['id']);   
        }
        if($data['email']==''){
            return true;    
        }
        $user = $model->where('email', $data['email'])->first();
        if(!$user){
          return true;
        }
        return false;
    }
    //validate ip address
    public function validateIp(string $str, string $fields, array $data)
    {
        if (filter_var($data['ip_address'], FILTER_VALIDATE_IP)) {
            return true;
        } else {
            return false;
        }
    }
    //for employees
    public function employeeCheckPhone(string $str, string $fields, array $data){
        $model = new EmployeeModel();
        if(isset($data['id']) && isset($data['id'])!=''){
            $model->where('id !=', $data['id']);   
        }
        if(!empty($data['phone_number'])){
            $employee = $model->where('phone_number', $data['phone_number'])->first();
            if(!$employee){
                return true;
            }
            else{
                return false;   
            }
        }
        else {
            return true;   
        }
    }
    //for employees
    public function employeeCheckMobile(string $str, string $fields, array $data){
        $model = new EmployeeModel();
        if(isset($data['id']) && isset($data['id'])!=''){
            $model->where('id !=', $data['id']);   
        }
        if(!empty($data['mobile_number'])){
            $employee = $model->where('mobile_number', $data['mobile_number'])->first();
            if(!$employee){
                return true;
            }
            else{
                return false;   
            }
        }
        else {
            return true;
        }
    } */
    //check employee email exists
    public function employeeCheckEmail(string $str, string $fields, array $data){
        $model = new UsersModel();
        if(isset($data['id']) && isset($data['id'])!=''){
            $model->where('id !=', $data['id']);   
        }
        $user = $model->where('email', $data['email'])->first();
        /*echo "<pre>user::";
        print_r($user);exit;*/
        if(!$user){
          return true;
        }
        return false;
    }
    //check Name already exists
    /*public function CheckNameExists(string $str, string $fields, array $data){
        $model = new ManufacturerModel();
        $this->encryption = \Config\Services::encrypter();
        if(isset($data['id']) && $data['id']!=''){
            $model->where('id !=', $this->encryption->decrypt(base64_decode(str_replace(array('-', '_', '~'), array('+', '/', '='), $data['id']))));   
        }
        $model->where('store_id', session()->get('parent_store_id'));   
        $user = $model->where('name', trim(preg_replace('/\s+/', ' ',$data['name'])))->first();
        if(!$user){
          return true;
        }
        return false;
    }
    //check product already exists or not
    public function checkproductExists(string $str, string $fields, array $data)
    {
        if(isset($data['product_sku']) && !empty($data['product_sku_array'])){
            return (!in_array($data['product_sku'],$data['product_sku_array']))?true:false;
        }else{
            return true;
        }
    }
    
    public function CheckDeviceNameExists(string $str, string $fields, array $data){
        $model = new DeviceModel();
        $this->encryption = \Config\Services::encrypter();
        if(isset($data['id']) && $data['id']!=''){
            $model->where('id !=', $this->encryption->decrypt(base64_decode(str_replace(array('-', '_', '~'), array('+', '/', '='), $data['id']))));   
        }
        $model->where('manufacturer_id', $data['manufacturer']);
        $model->where('store_id', session()->get('parent_store_id'));   
        $user = $model->where('device_name', trim(preg_replace('/\s+/', ' ',$data['name'])))->first();
        if(!$user){
          return true;
        }
        return false;
    }   */
}
