<?php

namespace App\Http\Controllers\Enterprise;

use App\Enterprise;
use App\Http\Requests\StoreEnterpriseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller {

    /**
     * RegisterController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the create enterprise view
     *
     * @return Response
     */
    public function create() {
        return view('enterprise.create');
    }


    /**
     * Store a new enterprise
     *
     * @param StoreEnterpriseRequest $request
     */
    public function store(StoreEnterpriseRequest $request) {
        $enterprise = Enterprise::create($request->all());

        $enterprise->users()->attach(Auth::user(), ['is_admin' => 1]);

        return redirect()->route('');
    }

}
