<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
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

            if (!isset($data['token'])) {
                return redirect()->back()->with('error', 'Registration failed. Please try again.');
            }

            session()->set('token', $data['token']);
            session()->set('user', $first_name . '' . $last_name);

            return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Registration failed. Please try again: ' . $e->getMessage());
        }
    }
}
