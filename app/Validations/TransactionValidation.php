<?php

namespace App\Validations;

class TransactionValidation
{
  public static function topUpRules(): array
  {
    return [
      'amount' => 'required|min_length[5]|max_length[7]',
    ];
  }

  public static function topUpMessages(): array
  {
    return [
      'amount' => [
        'required' => 'Nominal top up harus diisi',
        'min_length' => 'Nominal top up minimal Rp. 10.000',
        'max_length' => 'Nominal top up maksimal Rp. 1.000.000',
      ],
    ];
  }
}
