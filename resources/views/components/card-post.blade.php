@props(['post'])

<article class=" bg-white mb-8 shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-80 object-cover object-center" 
        src="{{$post->image ? Storage::url($post->image->url): 'https://images.unsplash.com/photo-1714374902207-6a2f324b0c4e?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" alt="{{ $post->name }}">

    <div class="px-6 py-4 mb-4">
      <h1 class="font-bold text-xl mb-2">
        <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
      </h1>
      <div class="text-gray-700 text-base">
        {!! $post->extract!!}
      </div>
    </div>

    <div class="px-6 pt-4 pb-2">
      @foreach ($post->tags as $tag)
      <a href="{{ route('posts.tag', $tag) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 
          text-sm text-gray-700 mr-2">{{ $tag->name }}</a>
      @endforeach
    </div>

  </article>