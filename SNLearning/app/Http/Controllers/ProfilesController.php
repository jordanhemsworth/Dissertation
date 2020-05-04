<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user){                        //Show function to accept user

        return view('profiles.show', compact('user'));              //Show profiles viwe and send through user

    }

    public function edit(User $user){                        //Show function to accept user

        $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));              //Show profiles viwe and send through user

    }
}
