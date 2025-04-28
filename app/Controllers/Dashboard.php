<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\DashboardService;
use App\Validations\TransactionValidation;
use CodeIgniter\HTTP\ResponseInterface;


class Dashboard extends BaseController
{
    protected $dashboardService;

    public function __construct()
    {
        $this->dashboardService = new DashboardService();
    }

    public function index()
    {
        $token = session()->get('token');
        try {
            $resultBalance = $this->dashboardService->getBalance($token);
            $resultService = $this->dashboardService->getService($token);
            $resultBanner = $this->dashboardService->getBanner($token);
            if ($resultBalance['status'] !== 0 || $resultService['status'] !== 0 || $resultBanner['status'] !== 0) {
                return redirect()->to('/login')->with('errors', $resultBalance['message']);
            }
            return view('dashboard/index', [
                'balance' => $resultBalance['data']['balance'],
                'services' => $resultService['data'],
                'banners' => $resultBanner['data'],
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errors', 'Gagal: ' . $e->getMessage());
        }
    }

    public function topup()
    {
        $token = session()->get('token');
        try {
            $resultBalance = $this->dashboardService->getBalance($token);
            if ($resultBalance['status'] !== 0) {
                return redirect()->to('/login')->with('errors', $resultBalance['message']);
            }
            return view('dashboard/topup', [
                'balance' => $resultBalance['data']['balance'],
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errors', 'Gagal Topup: ' . $e->getMessage());
        }
    }

    public function topUpProcess()
    {
        $token = session()->get('token');
        $validation = \Config\Services::validation();
        $rules = TransactionValidation::topUpRules();
        $messages = TransactionValidation::topUpMessages();
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('error_validations', $validation->getErrors());
        }
        $amount = $this->request->getPost();
        try {
            if ($amount['amount'] != 20000) {
                return redirect()->to('/topup')->with('errors', $amount['amount']);
            }
            return redirect()->to('/topup')->with('success', 'Topup berhasil.');
            // $result = $this->dashboardService->topUp($token, $amount['amount']);
            // if ($result['status'] !== 0) {
            //     return redirect()->to('/login')->with('errors', $result['message']);
            // }
            // return redirect()->to('/dashboard')->with('success', 'Topup berhasil.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errors', 'Gagal: ' . $e->getMessage());
        }
    }
}
