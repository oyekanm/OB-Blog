<x-dashboard-layout >
    {{-- @dd(session())  --}}
    <div class="container">
        
     {{-- {!! Form::open(['action' => ['App\Http\Controllers\HomeController@destroy']]) !!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete Account', ['class'=>'delete btn btn-danger '])}}
          {!! Form::close() !!} --}}
        <div class="flex justify-end mb-[20px] pt-4">
            <x-white-btn href="{{route('posts.create')}}" class="capitalize" title="create post"/>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <x-title title="post management" />
            </div>
        </div>
        <section class="overflow-x-auto">
            <table class="table table-bordered">
                <tr>
                    <x-table.thead title="no"/>
                    <x-table.thead title="title"/>
                    <x-table.thead title="category"/>
                    <x-table.thead title="action"/>
                </tr>
                @foreach ($posts as $key => $post)
                    <tr>
                        <x-table.tdata>
                            {{$key +1}}
                        </x-table.tdata>
                        <x-table.tdata>{{ $post->title }}</x-table.tdata>
                        <x-table.tdata>
                            @if(!empty($post->category))
                                    @php
                                        $cate = $post->category->pluck("name")->all();
                                    @endphp
                                        {{implode(", ",  $cate )}}
                                        {{-- {{implode(", ",  $post->category->pluck("name")->all() )}} --}}
                            @endif
                        </x-table.tdata>
                            {{-- @dd(implode(", ",  $post->category->pluck("name")->all() )) --}}
                        <td class="flex items-center justify-center gap-[20px]">
                            <x-white-btn class="py-[0rem] px-[.4rem]" href="{{ route('posts.show',$post->slug) }}" title="show"/>
                            <x-white-btn class="py-[0rem] px-[.4rem]" href="{{ route('posts.edit',$post->id) }}" title="edit"/>
                            <form action="{{route('posts.destroy',$post->id)}}" onsubmit="return confirm('are you sure')" method="POST">
                                @csrf
                                @method("delete")
                                <x-forms.delete-btn title="delete" class="px-[.5rem] py-0"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </section>
       
    </div>
</x-dashboard-layout>
