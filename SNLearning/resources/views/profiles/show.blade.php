@extends('layouts.app')

@section('content')
    
    <header class="rounded-full mb-6 relative">
        <div class="relative">
            <img
                src="/images/banner.png"
                alt="profilebanner"
                class="mb-2"
            >
        
            <img
                src="{{ $user->avatar }}"
                alt=""
                class="rounded-full absolute bottom-0 transform -translate-x-1/2 md:translate-y-1/2"
                style="left: 50%"      
                width="120"
                >                                                                    <!--Retrieve the users avatar, use translate helpers to keep it half -->
        
        </div>    

            <div class="flex justify-between items-center mb-6">          <!-- Justify between to split divs left and right -->
                <div>
                    <h2 class="font-bold">{{ $user->name}}</h2>
                    <p class=""> User Since: {{ $user->created_at->diffForHumans()}} </p>
                </div>

                <div class ="flex">                                                                  

                    @if (current_user()->isNot($user))                                 <!-- If the user logged in isNot on their page, display follow, else show edit -->
                        <form method="POST" action="/profiles/{{$user->name}}/follow">  
                        @csrf
                            <button type="submit" 
                                class="bg-blue-700 text-white py-2 px-2"
                            >
                                {{current_user()->isFollowing($user) ? 'Unfollow User' : 'Follow Me'}}     <!-- Current user() the authenticated user from helpers. -->
                            </button>
                        </form>
                    @else
                            <button type="submit" class="bg-blue-400 text-white py-2 px-2">
                                <a href="{{ $user->profilePath('edit')}}">                      <!-- Append edit on to profilepath -->
                                    Edit Profile
                                </a>
                            </button>
                    @endif
                    
                </div>
            </div>

            <p class="text-center">User Bio</p>    

        
    </header>

    @include ('timeline', [

        'questions' => $user->questions
    ])

@endsection