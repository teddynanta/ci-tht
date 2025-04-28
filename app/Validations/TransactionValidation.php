<?php

namespace App\Validations;

class TransactionValidation
{
  public static function topUpRules(): array
  {
    return [
      'amount' => 'required|numeric|greater_than_equal_to[10000]|less_than_equal_to[1000000]',
    ];
  }

  public static function topUpMessages(): array
  {
    return [
      'amount' => [
        'required' => 'Nominal top up harus diisi',
        'numeric' => 'Nominal top up harus angka',
        'greater_than_equal_to' => 'Nominal top up minimal Rp. 10.000',
        'less_than_equal_to' => 'Nominal top up maksimal Rp. 1.000.000',
      ],
    ];
  }
}
