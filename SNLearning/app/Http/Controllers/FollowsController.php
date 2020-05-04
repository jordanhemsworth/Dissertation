<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    public function store(User $user){                        //store function to accept user

        auth()->user()->toggleFollowing($user);          //Have authenticated user follow selected user

        return back();              //Show profiles viwe and send through user

    }
}
