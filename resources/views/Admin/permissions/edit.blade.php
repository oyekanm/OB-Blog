<x-admin-layout>
  <div class="col-lg-12 margin-tb">
      <x-title title="edit permission" />
      <x-forms.return-btn href="{{ route('admin.permissions.index') }}"/>
  </div>
  <form action="{{route('admin.permissions.update',$permission->id)}}" method="post">
      @csrf
     <x-forms.form-group title="name*">
          <x-forms.create-input
          type="text"
          name="name"
          id="name"
          value="{{$permission->name}}"
          />
     </x-forms.form-group>
     <x-forms.form-group title="roles">
      @if (Count($roles)> 0)
          @foreach ($roles as $role)
            <div  class="flex items-center gap-[10px]">
              <label class="text-[1.8rem] font-bold capitalize">
                {{ Form::checkbox('roles[]', $role->id, 
                  in_array($role->id, $roled) ? true : false,
                  array('class' => '')) 
                }}
                  {{$role->name}}
              </label>
            </div>
          @endforeach
      @endif
     </x-forms.form-group>
      
      @method("put")
      <x-forms.submit-btn title="submit" />
  </form>
</x-admin-layout>