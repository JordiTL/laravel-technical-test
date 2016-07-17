<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Update user profile and redirects back.
     *
     * @param integer $id user id
     * @param Request $request request object
     * @return @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find($id);

        if (!$user->update(Input::all())) {

            return Redirect::back()
                ->with('message', 'Something wrong happened while saving your model')
                ->withInput();
        }

        return Redirect::route('profile')
            ->with('message', 'User updated.');
    }
}
