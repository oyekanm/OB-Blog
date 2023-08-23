
<x-admin-layout>
  <div class="row">
    <div class="col-lg-12 margin-tb">
        <x-title title="create new role" />
        <x-forms.return-btn href="{{ route('admin.roles.index') }}"/>
    </div>
  </div>
    <form action="{{route('admin.roles.store')}}" method="post">
        @csrf
        <x-forms.form-group title="name*">
            <x-forms.create-input
              type="text"
              name="name"
              id="name"
            />
        </x-forms.form-group> 
        <x-forms.form-group title="permissions*">
          @if (Count($permissions)> 0)
            @foreach ($permissions as $permission)
              <div  class="flex items-center gap-[10px]">
                  <x-forms.create-input
                    type="checkbox"
                    name="permissions[]"
                    id="{{$permission->name}}"
                    value="{{$permission->id}}"
                    class="w-auto shadow-none"
                  />
                  <label for="{{$permission->name}}" class="text-[1.8rem] font-bold capitalize">
                    {{$permission->name}}
                  </label>
              </div>
            @endforeach
          @endif
        </x-forms.form-group>
        <x-forms.submit-btn title="submit" />
    </form>
</x-admin-layout>