<x-admin-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <x-title title="show user" />
            <div class="flex justify-between">
                <x-forms.return-btn href="{{ route('admin.users.index') }}"/>
                <form action="{{route('admin.users.destroy',$user->id)}}" onsubmit="return confirm('are you sure')" method="POST">
                    @csrf
                    @method("delete")
                    <x-forms.delete-btn title="delete" class="px-[.5rem] py-0"/>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <x-data-card title="name:" >
           {{ $user->name }}
        </x-data-card>
        <x-data-card title="email:" >
           {{ $user->email }}
        </x-data-card>
        {{-- @dd($user->roles) --}}
        <x-data-card title="{{count($user->roles) > 1 ? 'roles:':'role:'}}" >
            @if(!empty($user->roles))
                @php
                    $users =$user->roles->pluck('name')->all()
                @endphp
                {{-- @dd($users) --}}
                    {{implode(",",  $users )}}
            @endif
        </x-data-card>
        <x-data-card title="{{$user->getPermissionsViaRoles()->count() > 1 ? 'permissions:':'permission:'}}" >
            @if(!empty($user->getPermissionsViaRoles()))
                    @php
                        $permission = $user->getPermissionsViaRoles()->pluck('name')->all()
                    @endphp
                        {{implode(", ", $permission)}}
            @endif
        </x-data-card>
    </div>
</x-admin-layout>