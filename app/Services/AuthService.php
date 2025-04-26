<?php

namespace App\Services;

class AuthService
{
  protected $client;

  public function __construct()
  {
    $this->client = \Config\Services::curlrequest();
  }

  public function apiLogin($email, $password)
  {
    $response = $this->client->post('https://take-home-test-api.nutech-integrasi.com/login', [
      'form_params' => [
        'email' => $email,
        'password' => $password
      ]
    ]);

    return json_decode($response->getBody(), true);
  }

  public function getProfile($token)
  {
    $response = $this->client->get('https://take-home-test-api.nutech-integrasi.com/profile', [
      'headers' => [
        'Authorization' => 'Bearer ' . $token,
      ]
    ]);

    return json_decode($response->getBody(), true);
  }
}
