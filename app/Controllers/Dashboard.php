<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\DashboardService;
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
            return redirect()->back()->withInput()->with('errors', 'Gagal Topup: ' . $e->getMessage());
        }
    }
}
