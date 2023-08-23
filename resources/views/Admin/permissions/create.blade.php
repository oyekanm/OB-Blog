<x-admin-layout>
    <div class="col-lg-12 margin-tb">
      <x-title title="create permission" />
      <x-forms.return-btn href="{{ route('admin.permissions.index') }}"/>
    </div>
    <form action="{{route('admin.permissions.store')}}" method="post">
        @csrf
        <x-forms.form-group title="name*">
          <x-forms.create-input
            type="text"
            name="name"
            id="name"
          />
        </x-forms.form-group>
        <x-forms.form-group title="roles*">
          @if (Count($roles)> 0)
            @foreach ($roles as $role)
              <div  class="flex items-center gap-[10px]">
                  <x-forms.create-input
                    type="checkbox"
                    name="roles[]"
                    id="{{$role->name}}"
                    value="{{$role->id}}"
                    class="w-auto shadow-none"
                  />
                  <label for="{{$role->name}}" class="text-[1.8rem] font-bold capitalize">
                    {{$role->name}}
                  </label>
              </div>
            @endforeach
          @endif
        </x-forms.form-group>
        <x-forms.submit-btn title="submit" />
    </form>
</x-admin-layout>