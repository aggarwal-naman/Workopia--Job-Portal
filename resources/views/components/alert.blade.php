@props(['type', 'message', 'timeout' => '5000'])

@if(session() -> has($type))
    <div 
    {{-- these x- are called directives and we are using alpine js in our layout.blade file for this --}}
        x-data="{show: true}" {{-- We are creating a new object with a property of show and setting it to true by default --}}
        x-init="setTimeout(() => show=false, {{$timeout}})" {{-- x-init is used to set timeout of 5 seconds --}}
        x-show="show" {{-- it will only show if show=true but till then it has already been false by x-init --}}
        class="p-4 mb-4 text-sm text-white rounded {{$type=='success' ? 'bg-green-500' : 'bg-red-500'}}"
    >
        {{$message}}
    </div>
@endif