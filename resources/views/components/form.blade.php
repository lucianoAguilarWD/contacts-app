<div class="{{$style ?? 'bg-white p-8 rounded-lg shadow-md w-96'}}">
    <h2 class="text-2xl font-semibold text-center mb-6">{{$title}}</h2>

    @if(session('success'))
    <p class="text-green-500 text-center mb-4">{{ session('success') }}</p>
    @endif

    <form action="{{ $url }}" method="POST" class="space-y-4" {{ $atributos ?? null }}>
        @csrf
        {{ $campos }}
        <button type="submit" class="w-full px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg ">{{$submit}}</button>
    </form>
    <div>
        {{ $agregados ?? '' }}
    </div>
</div>