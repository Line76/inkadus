<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    /**
     * Show the main page of the dashboard
     *
     * @return Response
     */
    public function index() {
        $enterprises = Auth::user()->enterprises;

        return view('dashboard.index', compact('enterprises'));
    }

}
