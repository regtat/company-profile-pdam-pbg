<p class="font-poppins mt-3 flex items-start uppercase text-lg">Artikel Lainnya</p>
@foreach ($posts as $post)
    <hr class="my-4">
    <a href="/post/{{$post->id}}">
        <div class="grid-container">
            <div class="item1">
                <img class="w-img-lp object-cover" src="{{asset('storage/'.$post->image)}}" alt="Post image">
            </div>
            <div class="font-poppins item2 title-lp">{{ $post->shortTitle() }}</div>
        </div>
    </a>
@endforeach
