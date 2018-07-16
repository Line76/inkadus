<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller {

    public function create(Request $request) {
        $enterprises = $request->user()->enterprises;

        return view('offer.create', compact('enterprises'));
    }

}
