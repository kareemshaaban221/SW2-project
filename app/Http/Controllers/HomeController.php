<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ApiService;
use App\Http\Controllers\Services\Helpers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    use Helpers, ApiService;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // read
        $egypt = $this->getApiJson('https://api.covid19api.com/country/egypt');

        $len = count($egypt);

        $currentDayStat = $egypt[$len - 1];

        $previousDayStat = $egypt[$len - 2];

        return view('home', [
            'newCases' => $this->readableNumbers($currentDayStat->Confirmed) - $this->readableNumbers($previousDayStat->Confirmed),
            'deaths' => $this->readableNumbers($currentDayStat->Deaths),
            'totalCurrent' => $this->readableNumbers($currentDayStat->Confirmed),
            'totalActive' => $this->readableNumbers($currentDayStat->Active),
            'cases2020' => $egypt[344]->Confirmed,
            'cases2021' => $egypt[709]->Confirmed,
            'cases2022' => $currentDayStat->Confirmed
        ]);
    }
}
