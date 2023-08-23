@props(['post','grid' => '','cate'])

<div class="Post">
    <div  class="  gap-[30px] sm:p-4 grid-cols-2 {{$grid}}">
        <a href="/posts/{{$post->slug}}" class="Post__link">
            <img class="w-full object-cover h-full sm:h-[250px]  lg:h-[400px]" src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->title}}">
        </a>
        <div class="flex justify-center  flex-col">
            <a href="/posts/{{$post->slug}}" class="Post__link mb-4" >
                <p class="text-[1.8rem] font-semibold capitalize break-words">{{$post->title}}</p>
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
                 
            </a>
            <div class="flex flex-wrap items-center gap-[5px] sm:gap-[10px]">
                {{-- @dd($post) --}}
                {{-- @dd($cate) --}}
             
                @if ($post->category)
                    @foreach ($post->category as $cate)
                        <a href="/posts/?category={{$cate->id}}" class="bg-[rgba(0,0,0,0.8)] text-[rgba(255,255,255,.8)] py-2 rounded-[10px] text-[1.2rem] sm:text-[1.4rem] font-semibold w-[100px] sm:w-[120px] text-center">{{$cate->name}}</a>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
</div>