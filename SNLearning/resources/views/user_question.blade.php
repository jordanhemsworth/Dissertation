<div class="flex p-4 border-b border-b-gray">
    <div class="mr-4 flex-shrink-0">
        
        <a href="{{$question->user->profilePath() }}">        <!-- Route to the profile based on the user id of the selected question by picture -->
            <img
                src="{{$question->user->avatar}}" 
                alt=""
                class="rounded-full mr-2"
                width="50px"
            >
        </a>
    </div>

    <div>
        <a href="{{$question->user->profilePath() }}">        <!-- Route to the profile based on the user id of the selected question by name -->
            <h4 class="font-bold mb-4">{{$question->user->name}}</h4>
        </a>

        <p class="text-sm">
            {{$question->body}}
        </p>
    </div>  
</div>