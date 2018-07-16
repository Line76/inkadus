<?php

namespace App\Http\Controllers\Enterprise;

use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Notifications\InvitePeopleToEnterprise;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use stdClass;

class ManageController extends Controller {

    public function __construct() { $this->middleware('auth'); }

    public function show(string $slug) {
        $enterprises = Auth::user()->enterprises;
        $enterprise = Enterprise::findWithSlug($slug)->with('users')->first();

        return view('enterprise.show', compact('enterprise', 'enterprises'));
    }

    public function invitePeople(Request $request) {//TODO improve request validation
        $data = $request->all();

        $users = $this->createUsersFromRequest($data);

        $users->each(function ($user) {
            Notification::route('mail', $user->email)->notify(new InvitePeopleToEnterprise($user));
        });

        return redirect()->back();
    }

    private function createUsersFromRequest(array $data) {
        $users = new Collection();

        for ($i = 0; $i < count($data['last_name']); $i++) {
            $user = new StdClass();
            $user->last_name = $data['last_name'][$i];
            $user->first_name = $data['first_name'][$i];
            $user->email = $data['email'][$i];

            $users->add($user);
        }

        return $users;
    }

}
