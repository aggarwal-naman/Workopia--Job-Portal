@props(['id', 'name', 'label' => null, 'type' => 'file', 'required' => false])

<div class="mb-4">
    @if($label)
        <label for="{{$id}}" class="block text-gray-700">{{$label}}</label>
    @endif
    <input {{$required ? 'required' : ''}} id="{{$id}}" name="{{$name}}" type="file" class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror">
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror
</div>