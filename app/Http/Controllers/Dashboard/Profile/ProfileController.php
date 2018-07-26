<?php

namespace App\Http\Controllers\Dashboard\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller {

    private $types = [
        'Pharmacien adjoint',
        'Pharmacien associé',
        'Préparateur',
        'Rayonniste',
        'Etudiant pharmacie 3eme année',
        'Etudiant pharmacie 4eme année',
        'Etudiant pharmacie 5eme année',
        'Etudiant pharmacie 6eme année',
        'Pharmacien non thésé',
        'Diététicien',
        'Opticien',
        'Esthéticienne',
        'BP 1ere année',
        'BP 2eme année',
    ];

    /**
     * Main page of the user informations
     *
     * @return Response
     */
    public function index() {
        $enterprises = Auth::user()->enterprises;
        $types = $this->types;

        return view('dashboard.profile.index', compact('enterprises', 'types'));
    }

    public function typeStore(Request $request) {
        $this->validate($request, [
            'type' => ['required', Rule::in(array_keys($this->types))]
        ]);

        $request->user()->update($request->all());

        return redirect()->back();
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
