<x-admin-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-lg-12 margin-tb">
                <x-title title="show role" />
                <div class="flex justify-between">
                    <x-forms.return-btn href="{{ route('admin.roles.index') }}"/>
                    <form action="{{route('admin.roles.destroy',$role->id)}}" onsubmit="return confirm('are you sure')" method="POST">
                        @csrf
                        @method("delete")
                        <x-forms.delete-btn title="delete" class="px-[.5rem] py-0"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <x-data-card title="name:" >
           {{ $role->name }}
        </x-data-card>
        <x-data-card title="permissions:" >
            @if(!empty($role->permissions))
                    @php
                        $permission = $role->permissions->pluck("name")->all()
                    @endphp
                    {{implode(", ", $permission)}}
            @endif
        </x-data-card>
        <x-data-card title="users:" >
            @if(!empty($roles))
                    {{implode(",",  $roles )}}
            @endif
        </x-data-card>
    </div>
</x-admin-layout>