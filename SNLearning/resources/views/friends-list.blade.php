<h2> Following</h2>

<ul>
    @foreach (auth()->user()->follows as $user)
    <li class="mb-4">
        <div>
            <a href="{{route('profile', $user)}}" class="flex items-center">        <!-- Route to the profile based on the user id of the selected question -->
            <img
                src="{{ $user->avatar }}"
                alt=""
                class="rounded-full mr-2"
                width="50px"
            >
            {{ $user->name }}

            </a>
        </div>
    </li>
    @endforeach
</ul>