<div class="border border-purple-400">
    
    @foreach($questions as $question)      
        @include('user_question')          <!-- Render the questions until all are shown -->
    @endforeach
    
</div>