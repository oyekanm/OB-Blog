<x-dashboard-layout >
    <div class="container">
        <div class="flex justify-end mb-[20px] pt-4">
            <x-white-btn href="{{route('category.create')}}" class="capitalize" title="create category"/>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <x-title title="categories management" />
            </div>
        </div>
        <section class="overflow-x-auto">
            <table class="table table-bordered ">
                <tr>
                    <x-table.thead title="no"/>
                    <x-table.thead title="name"/>
                    <x-table.thead title="post"/>
                    <x-table.thead title="action"/>
                </tr>
                @foreach ($categories as $key => $category)
                    <tr>
                        <x-table.tdata>
                            {{$key +1}}
                        </x-table.tdata>
                        <x-table.tdata>{{ $category->name }}</x-table.tdata>
                        <x-table.tdata>
                            {{count($category->post)}}
                            {{-- @if(!empty($category->post))
                                @php
                                    $cate = $category->post->pluck("title")->all();
                                @endphp
                                    {{implode(", ",  $cate )}}
                            @endif --}}
                        </x-table.tdata>
                        <td class="flex items-center justify-center gap-[20px]">
                            {{-- <x-white-btn class="py-[0rem] px-[.4rem]" href="{{ route('category.show',$category->id) }}" title="show"/> --}}
                            <x-white-btn class="py-[0rem] px-[.4rem]" href="{{ route('category.edit',$category->id) }}" title="edit"/>
                            <form action="{{route('category.destroy',$category->id)}}" onsubmit="return confirm('are you sure')" method="POST">
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