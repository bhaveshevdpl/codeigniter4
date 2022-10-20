<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    public function __construct(){
        $this->user = new UsersModel();
        helper("cookie");
    }

    public function index()
    {
        //return view('welcome_message');
        return view('auth/login');
    }

    public function login()
    {        
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|max_length[255]|valid_email',
                'password' => 'required|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => lang('Validation.validateuser'),
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                return view('auth/login', [
                    "validation" => $this->validator,
                ]);
            } else {
                
                $user = $this->user->where('email', $this->request->getVar('email'))
                    ->first();
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $cookie_name = "adminAuth";
                if($this->request->getVar('rememberMe')==1){ 
                    set_cookie($cookie_name, 'usr='.$email.'&hash='.$password, 60*60*24*5); // 5 daysexit;
                } else {
                    delete_cookie($cookie_name);
                }
                $this->setUserSession($user);                
                return redirect()->to(base_url('dashboard'));
            }
        }
        return view('auth/login');
    }

    private function setUserSession($user)
    {
        $data = [
            'user_id' => $user['id'],
            'user_email' => $user['email'],
            'is_user_logged_in' => true,
            'role_id' => $user['role_id'],
            'username' => $user['name'],                            
            'user_email' => $user['email'],                          
            'user_type' => $user['user_type'],                          
            //'is_admin_login' => false,
        ];
        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function updatePassword()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'password' => 'required|max_length[255]|verifyPassword[password]',
                'new_password' => 'required|max_length[255]',
                'confirm_password' => 'required|max_length[255]',
            ];

            $errors = [
                'password' => [
                    'verifyPassword' => lang('Validation.old_pass_error'),
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                return view('profile/update_password', [
                    "validation" => $this->validator,
                ]);
            } else {
                $id = session()->get('user_id');
                try {
                    $data = [
                        'password' => $this->request->getVar('new_password'),
                    ];
                    $this->user->update($id, $data);
                } catch (\Exception $e) {
                    log_message('error', '[CUSTOM ERROR] {exception}', ['exception' => $e]);
                    return view('profile/update_password', [
                        "error_message" => lang('Messages.something_wrong'),
                    ]);
                }
                
                return view('profile/update_password', [
                    "success_message" => lang('Validation.password_updated'),
                ]);
            }
        }
        return view('profile/update_password');
    }
    public function registration()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'full_name' => ['label' => lang('Labels.full_name'), 'rules' => 'required|max_length[255]'],
                'email' => ['label' => lang('Labels.email'), 'rules' => 'required|max_length[255]|valid_email|checkEmail[email]'],
                'phone_number' => ['label' => lang('Labels.phone_number'), 'rules' => 'required|checkPhone[phone_number]'],
                'password' => ['label' => lang('Labels.password'), 'rules' => 'required|min_length[6]|max_length[255]'],
                'confirm_password' => ['label' => lang('Labels.confirm_pass'), 'rules' => 'required|matches[password]|min_length[6]|max_length[255]'],
            ];
            $errors = [
                'email' => [
                    'checkEmail' => lang('Validation.email_exist'),
                ],
                'phone_number' => [
                    'checkPhone' => lang('Validation.phone_number_exists'),
                ]
            ];
            if (!$this->validate($rules, $errors)) {
                return view('auth/registration', [
                    "validation" => $this->validator,
                ]);
            } else {
                $userData = [
                    "name"=> $this->request->getVar('full_name'),
                    "email"=> $this->request->getVar('email'),
                    "phone_number"=> $this->request->getVar('phone_number'),                    
                    'password' => $this->request->getVar('confirm_password'),
                ];
                $addData = $this->user->insert($userData);
                $user = $this->user->where('email', $this->request->getVar('email'))
                    ->first();
                $this->setUserSession($user);
                return redirect()->to(base_url('home'));
            }
        }
        return view('auth/registration');
    }
    public function resetPassword($verificationCode=NULL)
    {
        $data = [];
        if ($this->request->getMethod() == 'post'){
            $rules = [
                'password' => 'required|min_length[6]|max_length[255]',
                'confirm_password' => 'required|max_length[255]|matches[password]',
            ];
            if (!$this->validate($rules)) {
                return view('auth/reset_password', [
                    "validation" => $this->validator,
                ]);
            } else {
                try{
                    $data = [
                        'password' => $this->request->getVar('password'),
                        'verification_code' => NULL
                    ];
                    $user = $this->user->where('verification_code', $this->request->getVar('verificationCode'))->first();
                    $this->user->update($user['id'], $data);
                }catch (\Exception $e) {
                    log_message('error', '[CUSTOM ERROR] {exception}', ['exception' => $e]);
                    return view('auth/reset_password', [
                        "error_message" => lang('Messages.something_wrong'),
                        'verificationCode'=>$verificationCode
                    ]);
                }
                $_SESSION['success_message'] = lang('Validation.password_updated');
                return redirect()->to(base_url('thank-you'));
                exit();
            }
        }
        if($verificationCode){
            $chkverify = $this->user->where('verification_code', $verificationCode)
                    ->first();
            if(!empty($chkverify)){
                $data['verificationCode'] = $verificationCode;
                return view('auth/reset_password',$data);
            }
            else{
                return view('auth/reset_password', [
                    "error_message" => lang('Messages.expired_link'),
                    "expired_link"=>"yes",
                    'verificationCode'=>$verificationCode
                ]);
            }
        }else{
            return view('auth/reset_password', [
                "error_message" => lang('Messages.something_wrong'),
            ]);
        }
    }
    public function thank_you(){
        return view('auth/thankyou');
    }
    public function forgotPassword(){
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|max_length[255]|valid_email|checkEmailExist[email]',
            ];
            $errors = [
                'email' => [
                    'checkEmailExist' => lang('Validation.email_not_found'),
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                return view('auth/forgot_password', [
                    "validation" => $this->validator,
                ]);
            } else {
                $user = $this->user->where('email', $this->request->getVar('email'))->first();
                $verifi_code = random_string('alnum', 20).$user['id'].random_string('alnum', 5);
                $confirm_link = '<a href="'.base_url('reset-password/'.$verifi_code).'" style="text-decoration:underline;">here</a>';
                $arrayData = array(
                    'employee_name'=>$user['name'],
                    'forgotlink'=>$confirm_link,
                );
                $EmailBody = emailTemplateGenerate('forgot-password',$arrayData);
                /*echo $EmailBody['body'];exit;*/
                $this->email = \Config\Services::email();
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['newline'] = "\r\n";      
                $this->email->initialize($config);  
                $this->email->setFrom('chiragthoriya.evdpl@gmail.com', 'Incenti');
                $this->email->setTo(trim($this->request->getVar('email')));      
                $this->email->setSubject($EmailBody['subject']);  
                $this->email->setMessage($EmailBody['body']);            
                $this->email->send();
                //update generated verification code
                $data = [
                    'verification_code' => $verifi_code
                ];
                $this->user->update($user['id'], $data);
                return view('auth/forgot_password', [
                    "success_message" => lang('Messages.forgot_success'),
                ]);
            }
        }
        return view('auth/forgot_password');
    }
}
