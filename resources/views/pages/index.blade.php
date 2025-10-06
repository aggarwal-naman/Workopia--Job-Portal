<x-layout>
    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Welcome to Workopia</h1>

    <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
        @forelse($jobs as  $job)
            <div>
                <x-job-card :job="$job" />
            </div>
        {{-- {{$job -> description}} --}}
        @empty 
            <p style="color:red">Oops, no jobs avaiable at the moment!<br>Please come again later.</p>
        @endforelse
    </div>
    <a href="{{route('jobs.index')}}" class="block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"></i> Show All Jobs
    </a>

    <x-bottom-banner />
</x-layout>