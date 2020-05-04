<x-master>


<section class="px-8">
    <main class="container mx-auto">
        <div class="lg:flex lg:justify-between">       <!-- Only flex on large screens -->
            <div class="lg:w-32 bg-blue-100">
                @include ('sidebar-links')
            </div>
            
            <div class="lg:flex-1 lg:mb-10" style="max-width: 750px">
                {{$slot}}
            </div>
            
            <div class="lg:w-1/6 bg-blue-100">
                    @include ('friends-list')
            </div>
        </div>
    </main>
</section>   

</x-master>


