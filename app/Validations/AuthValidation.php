<?php

namespace App\Validations;

class AuthValidation
{
  public static function loginRules(): array
  {
    return [
      'email' => 'required|valid_email',
      'password' => 'required|min_length[6]',
    ];
  }

  public static function registerRules(): array
  {
    return [
      'first_name' => 'required',
      'last_name'  => 'required',
      'email'      => 'required|valid_email',
      'password'   => 'required|min_length[8]',
      'password_confirmation' => 'required|matches[password]',
    ];
  }
}
