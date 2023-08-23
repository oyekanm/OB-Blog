<x-admin-layout>
    <div class="container">
        <div class="flex justify-end mb-[20px]">
            <x-white-btn href="{{route('admin.users.create')}}" class="capitalize" title="create new user"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <p class="text-[2rem] font-bold leading-3">Users Management</p>
            </div>
        </div>
    </div>
    <section class="overflow-x-auto">
        <table class="table table-bordered">
            <tr>
                <x-table.thead title="no"/>
                <x-table.thead title="name"/>
                <x-table.thead title="email"/>
                <x-table.thead title="roles"/>
                <x-table.thead title="action"/>
            </tr>
            @foreach ($users as $key => $user)
                <tr>
                    <x-table.tdata>
                        {{$key +1}}
                    </x-table.tdata>
                    <x-table.tdata>{{ $user->name }}</x-table.tdata>
                    <x-table.tdata>{{ $user->email }}</x-table.tdata>
                    <x-table.tdata>
                        {{-- @dd($user->getRoleName()) --}}
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                {{ $v }}
                            @endforeach
                        @endif
                    </x-table.tdata>
                    <td class="flex items-center justify-center gap-[20px]">
                        <x-white-btn class="py-[0rem] px-[.4rem]" href="{{ route('admin.users.show',$user->id) }}" title="show"/>
                        <x-white-btn class="py-[0rem] px-[.4rem]" href="{{ route('admin.users.edit',$user->id) }}" title="edit"/>
                            {{-- {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!} --}}
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
</x-admin-layout>