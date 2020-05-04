<div class="border border-black-400 mb-6 py-2 px-6">
    <form method ="POST" action="/questions">
        @csrf

        <textarea
            name="body"
            id=""
            class="w-full"
            placeholder="Any Questions?"
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between"> <!-- The space between button and avatar to be equal -->
            <img
                src="{{auth()->user()->avatar}}"
                alt="Your picture!"
                class="rounded-full mr-2"
                width="50px"
            >

            <button type="submit" class="bg-blue-700 text-white py-2 px-2">Ask Away!</button>

        </footer>
    </form>

    @error('body')
    <p class="text-red-500">{{$message}}</p>
    @enderror
</div>

