<x-dashboard-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <x-title title="create new role" />
            <x-forms.return-btn href="{{ route('category.index') }}"/>
        </div>
      </div>
        <form action="{{route('category.store')}}" method="post">
            @csrf
            <x-forms.form-group title="name*">
                <x-forms.create-input
                  type="text"
                  name="name"
                  id="name"
                />
            </x-forms.form-group> 
            <x-forms.submit-btn title="submit" />
        </form>
</x-dashboard-layout>