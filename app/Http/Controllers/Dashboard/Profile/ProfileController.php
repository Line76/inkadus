<?php

namespace App\Http\Controllers\Dashboard\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

    /**
     * Main page of the user informations
     *
     * @return Response
     */
    public function index() {
        $enterprises = Auth::user()->enterprises;

        return view('dashboard.profile.index', compact('enterprises'));
    }


    /**
     * Show the form to edit the user profile
     *
     * @return Response
     */
    public function edit() {
        $user = Auth::user();
        return view('dashboard.profile.edit', compact('user'));
    }

    /**
     * Update the user
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request) {
        $user = Auth::user();
        $user->update($request->all());

        return redirect(route('dashboard.profile'));
    }

}
