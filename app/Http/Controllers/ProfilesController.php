<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Show all application users.
 *
 * @return \Illuminate\Http\Response
 */

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' =>$user,
            'whisps' => $user->whisps()->withLikes()->paginate(50)
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username'=> ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'banner' => ['file'],
            'description' => ['string','max:255','nullable'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
        ]);

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatar');
        }

        if(request('banner')){
            $attributes['banner'] = request('banner')->store('banner');
        }
        $user->update($attributes);

        return redirect($user->path());
    }

}
