<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Myprofile extends BaseController
{
    public function __construct(){
        $this->user = new UsersModel();
    }

    public function updateProfile()
    {
        $user_id = session()->get('user_id');
        $data = [];
        //$view_data['language_details'] = $this->user->getLanguages();
        //$view_data['country_details'] = $this->user->getCountries();
        $employee_details = $this->user->where('id', $user_id)->first();
        $view_data['employee_details'] = $employee_details;
        /*echo "<pre>view_data::";
        print_r($view_data);exit;*/
        //for intl plugin :: Start
        if(!empty($view_data['employee_details']['phone_code'])){
            $getIsobyMobileCode = $this->user->getIsobyPhnCode($view_data['employee_details']['phone_code']);
            $view_data['onedit_phoneiso'] = $getIsobyMobileCode->iso;
        }
        if(!empty($view_data['employee_details']['mobile_code'])){
            $getIsobyPhnCode = $this->user->getIsobyPhnCode($view_data['employee_details']['mobile_code']);
            $view_data['onedit_mobileiso'] = $getIsobyPhnCode->iso;
        }
       // $view_data['all_iso'] = $this->user->country_iso_for_dropdown();
//        $view_data['default_iso'] = $this->user->getDefaultIso();
        //for intl plugin :: End

        if ($this->request->getMethod() == 'post') {
            
            $rules = [
                'name' => ['label' => lang('Labels.full_name'), 'rules' => 'required|max_length[255]'],
                'email' => 'required|min_length[6]|max_length[255]|valid_email|employeeCheckEmail[email,id]',               
                'phone_number' => ["rules" =>'max_length[20]', "label"=>lang('Labels.phone_number')],
                //'phone_number' => ["rules" =>'max_length[20]|employeeCheckPhone[phone_number,id]', "label"=>lang('Labels.phone_number')],
                
                /*'email' => ['label' => lang('Labels.email'), 'rules' => 'required|max_length[255]|valid_email|checkEmail[email]'],
                'phone_number' => ['label' => lang('Labels.phone_number'), 'rules' => 'required|checkPhone[phone_number]'],*/
                
            ];
            $errors = [
                'phone_number' => [
                    'employeeCheckPhone' => lang('Validation.phone_number_exists'),
                ],
                /*'mobile_number' => [
                    'emailCheckMobile' => lang('Validation.mobile_number_exists'),
                ],*/
                'email' => [
                    'employeeCheckEmail' => lang('Validation.email_exist'),
                ],
            ];
            /*$add_img_validation = $this->request->getFile('Image');
            if($add_img_validation->isValid()) {
                $rules['Image'] = [
                    'rules' => 'uploaded[Image]'
                        . '|is_image[Image]'
                        . '|mime_in[Image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[Image,500]'
                        . '|ext_in[Image,png,jpg,jpeg,gif]',
                ];
            }*/
            if (!$this->validate($rules,$errors)) {
                $employee_details = $this->user->where('id', $user_id)->first();
                $view_data['employee_details'] = $employee_details;
                $view_data['validation'] = $this->validator;
                
                return redirect()->back()->withInput()->with('errors',$this->validator->listErrors());
            } else {
                try {
                    $data = [
                        'name' => $this->request->getVar('name'),
                        'email' => $this->request->getVar('email'),
                        //'phone_code' =>  ($this->request->getVar('phone_code'))?$this->request->getVar('phone_code'):NULL,
                        'phone_number' => $this->request->getVar('phone_number'),
                    ];
                    //upload image
                    /*$imageFile = $this->request->getFile('Image');
                    $newName = '';
                    if($imageFile){
                        if ($imageFile->isValid()) {
                            $newName = $imageFile->getRandomName();
                            $imageFile->move(ROOTPATH . 'public/uploads/employee_img', $newName);
                            $data['image'] = 'employee_img/'.$newName;
                        }
                    }*/
                    $this->user->update($user_id, $data);
                    //delete old image
                    /*if(($this->request->getVar('is_img_removed') == '1' || $newName != '') && $this->request->getVar('uploaded_image') && file_exists(ROOTPATH . 'public/uploads/'.$this->request->getVar('uploaded_image'))) {
                        unlink(ROOTPATH . 'public/uploads/'.$this->request->getVar('uploaded_image'));

                    }*/
                } catch (\Exception $e) {
                    log_message('error', '[CUSTOM ERROR] {exception}', ['exception' => $e]);
                    $employee_details = $this->user->where('id', $user_id)->first();
                    $view_data['employee_details'] = $employee_details;
                    $view_data['error_message'] = lang('Messages.something_wrong');
                    return view('profile/update_profile', $view_data);
                }
                $employee_details = $this->user->where('id', $user_id)->first();
                $view_data['employee_details'] = $employee_details;
                $view_data['success_message'] = lang('Messages.profile_updated');
                return view('profile/update_profile', $view_data);
            }
        }
        return view('profile/update_profile', $view_data);
    }
}
