<x-app-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8 "> 
        <h1 class="text-4xl font-bold text-gray-600" > {{$post->name}} </h1>

        <div class="text-lg text-gray-500 mb-2" >
            {!!$post->extract!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 ">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{$post->image ? Storage::url($post->image->url): 'https://images.unsplash.com/photo-1714374902207-6a2f324b0c4e?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" alt="">
                </figure>
                <div class="text-base text-gray-500 mt-4 ">
                    {!!$post->body!!}
                </div>
            </div>

           {{--  contenido relacionado --}}

           <aside >
            <h1 class="text-2xl font-bold text-gray-600 mb-4">
                Más en {{ $post->category->name }}
            </h1>
              <ul>
            @foreach ($similares as $similar)
                <li class="mb-4">
                  <a class="flex" href="{{ route('posts.show', $similar) }}">
                  
                    <img class="w-36 h-20 object-cover object-center" src="{{ Storage::url($similar->image->url) }}" alt="{{ $similar->name }}">
                   
                    <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                  </a>
                </li>
            @endforeach
              </ul>
        </aside>
        </div>
    </div>
</x-app-layout>