<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\AuthService;
use App\Validations\AuthValidation;

class Auth extends BaseController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }
    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $rules = AuthValidation::registerRules();
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error_validations', $this->validator->getErrors());
        }

        $input = $this->request->getPost();
        unset($input['password_confirmation']);
        try {
            $result = $this->authService->apiRegister($input['email'], $input['first_name'], $input['last_name'], $input['password']);

            if ($result['status'] !== 0) {
                return redirect()->back()->withInput()->with('errors', $result['message']);
            }
            return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errors', 'Login gagal: ' . $e->getMessage());
        }
    }

    public function login()
    {
        // $token = session()->get('token');
        // if (isset($token)) {
        //     redirect()->to('/dashboard');
        // }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $rules = AuthValidation::loginRules();
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error_validations', $this->validator->getErrors());
        }

        $input = $this->request->getPost();

        try {
            $result = $this->authService->apiLogin($input['email'], $input['password']);

            if ($result['status'] !== 0) {
                return redirect()->back()->withInput()->with('errors', $result['message']);
            }

            $token = $result['data']['token'];
            session()->set('token', $token);

            $profile = $this->authService->getProfile($token);

            if ($profile['status'] !== 0) {
                return redirect()->back()->withInput()->with('errors', $profile['message']);
            }

            session()->set('user', $profile['data']['first_name'] . ' ' . $profile['data']['last_name']);
            session()->set('email', $profile['data']['email']);
            session()->set('photo', $profile['data']['profile_image']);

            return redirect()->to('/dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errors', 'Login gagal: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
