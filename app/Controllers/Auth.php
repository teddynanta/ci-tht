<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\AuthService;
use Exception;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $email = $this->request->getPost('email');
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $password = $this->request->getPost('password');

        $client = \Config\Services::curlrequest();

        try {
            $response = $client->post('https://take-home-test-api.nutech-integrasi.com/registration', [
                'form_params' => [
                    'email' => $email,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'password' => $password
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if ($data['status'] !== 0) {
                return redirect()->back()->with('error', $data['message']);
            }
            return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Registration failed. Please try again: ' . $e->getMessage());
        }
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $client = \Config\Services::curlrequest();

        try {
            $response = $client->post('https://take-home-test-api.nutech-integrasi.com/login', [
                'form_params' => [
                    'email' => $email,
                    'password' => $password
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if ($data['status'] !== 0) {
                return redirect()->back()->with('error', $data['message']);
            }
            $token = $data['data']['token'];
            session()->set('token', $token);

            $response = $client->get('https://take-home-test-api.nutech-integrasi.com/profile', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);

            $profile = json_decode($response->getBody(), true);
            session()->set('user', $profile['data']['first_name'] . ' ' . $profile['data']['last_name']);
            session()->set('email', $profile['data']['email']);
            return redirect()->to('/dashboard');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Registration failed. Please try again: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
