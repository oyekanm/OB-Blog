<x-app-layout>
    {{-- @dd($post->category->pluck("name")->all()) --}}
    <main class="container">
        @if (!Auth::guest())
            @if ($post->user->id === Auth::user()->id)
                <div class="Post--guest">
                        <x-white-btn  href="{{ route('posts.edit',$post->id) }}" title="edit post"/>
                        <form action="{{route('posts.destroy',$post->id)}}" onsubmit="return confirm('are you sure')" method="POST">
                            @csrf
                            @method("delete")
                            <x-forms.delete-btn title="delete" />
                        </form>
                </div>
            @endif
        @endif
        <div>
            @if ($post)
                <div>
                    <img class="Post__image" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->title}}">
                    {{-- <img class="Post__image" src="{{$post->cover_image}}" alt=""> --}}
                </div>
                <div class="mb-[40px]">
                    <p class="Post__title break-words">{{$post->title}}</p>
                    <div class="flex items-center gap-[20px] mb-3">
                        <p class="text-[1.6rem] font-medium capitalize flex items-center gap-[5px]">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            </svg></span>  <strong>{{$post->user->name}}</strong>
                        </p>
                        <p class="text-[1.6rem] font-medium capitalize flex items-center gap-[5px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            {{$post->created_at}}
                        </p>
                    </div>
                    @if ($post->category)
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                                <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                            @foreach ($post->category as $cate)
                                <a href="/posts/?category={{$cate->id}}" class="text-[rgba(0,0,0,0.8)] mx-4  text-[1.2rem] sm:text-[1.4rem] text-center">{{$cate->name}}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="prose max-w-none prose-headings:capitalize prose-p:text-[2rem] prose-blockquote:text-gray-500 prose-a:text-blue-600" >{!!$post->body!!}</div>
            @endif
        </div>
    </main>
</x-app-layout>