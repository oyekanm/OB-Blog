

<x-admin-layout>
    <div class="col-lg-12 margin-tb">
        <x-title title="edit role" />
        <x-forms.return-btn href="{{ route('admin.roles.index') }}"/>
    </div>
    <form action="{{route('admin.roles.update',$role->id)}}" method="post">
        @csrf
       <x-forms.form-group title="name">
            <x-forms.create-input
            type="text"
            name="name"
            id="name"
            value="{{$role->name}}"
            />
       </x-forms.form-group>
       <x-forms.form-group title="permissions">
          @if (Count($permissions)> 0)
            @foreach ($permissions as $permission)
              <div  class="flex items-center gap-[10px]">
                  <label class="text-[1.8rem] font-bold capitalize">
                    {{ Form::checkbox('permissions[]', $permission->id, 
                      in_array($permission->id, $rolePermissions) ? true : false,
                      array('class' => '')) 
                      }}
                    {{$permission->name}}
                  </label>
              </div>
            @endforeach
          @endif
       </x-forms.form-group>
          @method("put")
       <x-forms.submit-btn title="submit" />
    </form>
</x-admin-layout>