<x-layout>
    <div class="bg-blue-900 h-24 px-4 mb-4 flex justify-center items-center rounded">
        <x-search/>
    </div>

    {{-- Back Button --}}
    @if(request()->has('keywords') || request()->has('location'))
        <a href="{{route('jobs.index')}}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded mb-4 inline-block">
            <i class="fa fa-arrow-left mr-1"></i> Back
        </a>
    @endif

    <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
        @forelse($jobs as  $job)
            <div>
                <x-job-card :job="$job" />
            </div>
        {{-- {{$job -> description}} --}}
        @empty 
            <p class="text-red-500">Oops, no jobs avaiable at the moment!<br>Please come again later.</p>
        @endforelse
    </div>

    {{-- Pagination Links --}}
    {{$jobs->links()}}
</x-layout>