<x-dashboard-layout >
    <div class="col-lg-12 margin-tb">
        <x-title title="edit role" />
        <x-forms.return-btn href="{{ route('category.index') }}"/>
    </div>
    <form action="{{route('category.update',$category->id)}}" method="post">
        @csrf
       <x-forms.form-group title="name">
            <x-forms.create-input
            type="text"
            name="name"
            id="name"
            value="{{$category->name}}"
            />
       </x-forms.form-group>
          @method("put")
       <x-forms.submit-btn title="submit" />
    </form>
</x-dashboard-layout>