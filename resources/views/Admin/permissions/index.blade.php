<x-admin-layout>
    <div class="container">
        <div class="flex justify-end mb-[20px]">
            <x-white-btn href="{{route('admin.permissions.create')}}" class="capitalize" title="create premissions"/>
        </div>
        <div class="col-lg-12 margin-tb">
            <x-title title="manage permissions" />
        </div>
        <section class="overflow-x-auto">
            <table class="table table-bordered">
                <tr>
                    <x-table.thead title="no"/>
                    <x-table.thead title="name"/>
                    <x-table.thead title="roles"/>
                    <x-table.thead title="action"/>
                </tr>
                @foreach ($permissions as $key => $permission)
                    <tr>
                        <x-table.tdata>
                            {{$key +1}}
                        </x-table.tdata>
                        <x-table.tdata>{{ $permission->name }}</x-table.tdata>
                        <x-table.tdata>
                        
                            @if(!empty($permission->roles))
                                @php
                                    $role = $permission->roles->pluck("name")->all()
                                @endphp
                                {{-- @dd($role) --}}
                                    {{implode(", ",  $role )}}
                            @endif
                        </x-table.tdata>
                        <td class="flex items-center justify-center gap-[20px]">
                            <x-white-btn class="py-[0rem] px-[.5rem]" href="{{ route('admin.permissions.edit',$permission->id) }}" title="edit"/>
                            <form action="{{route('admin.permissions.destroy',$permission->id)}}" onsubmit="return confirm('are you sure')" method="POST">
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
</x-admin-layout>