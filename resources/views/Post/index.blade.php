<x-app-layout>
    <main class="container">
        {{-- <form action="{{route('posts.index')}}">
            <input type="text" name="post" id="post">
            <x-forms.submit-btn title="search" />
        </form> --}}
        <div class="Post__header">
            @if (!Auth::guest())
               <x-white-btn href="{{route('posts.create')}}" class="capitalize" title="create post"/>
            @endif
        </div>
        <div>
            {{-- @dd($cate_post) --}}
            @if (Count($posts) > 0)
                @foreach ($posts as $post)
                    <x-postview :post="$post" grid='sm:grid'/>
                @endforeach
                {{$posts->onEachSide(2)->links()}}
                
            @else
                <div class="text-center">
                    <p class="text-[2.5rem] font-medium capitalize">we don't have any stories at the moment</p>
                </div>
            @endif
            {{-- {{$paginator->count()}} --}}
        </div>
    </main>
</x-app-layout>