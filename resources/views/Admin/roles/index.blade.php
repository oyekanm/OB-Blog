<x-admin-layout>
    <div class="container">
        <div class="flex justify-end mb-[20px]">
            <x-white-btn href="{{route('admin.roles.create')}}" class="capitalize" title="create roles"/>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <x-title title="manage roles" />
            </div>
        </div>
        <section class="overflow-x-auto">
            <table class="table table-bordered">
                <tr>
                    <x-table.thead title="no"/>
                    <x-table.thead title="name"/>
                    <x-table.thead title="permissions"/>
                    <x-table.thead title="action"/>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <x-table.tdata>
                            {{$key +1}}
                        </x-table.tdata>
                        <x-table.tdata>{{ $role->name }}</x-table.tdata>
                        <x-table.tdata>
                            @if(!empty($role->permissions))
                                    @php
                                        $roles = $role->permissions->pluck("name")->all();
                                    @endphp
                                        {{implode(", ",  $roles )}}
                            @endif
                        </x-table.tdata>
                        <td class="flex items-center justify-center gap-[20px]">
                            <x-white-btn class="py-[0rem] px-[.4rem]" href="{{ route('admin.roles.show',$role->id) }}" title="show"/>
                            <x-white-btn class="py-[0rem] px-[.4rem]" href="{{ route('admin.roles.edit',$role->id) }}" title="edit"/>
                                {{-- {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!} --}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </section>
    </div>
</x-admin-layout>