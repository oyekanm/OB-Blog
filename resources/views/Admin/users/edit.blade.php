<x-admin-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <x-title title="edit user" />
            <x-forms.return-btn href="{{ route('admin.users.index') }}"/>
        </div>
    </div>
    {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}
    <div class="row">
        <x-forms.form-group title="Name:">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'block w-full mt-2 p-3 rounded-[10px] text-[1.5rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)] font-semibold focus-visible:outline-none')) !!}
        </x-forms.form-group> 
        <x-forms.form-group title="Email:">
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'block w-full mt-2 p-3 rounded-[10px] text-[1.5rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)] font-semibold focus-visible:outline-none')) !!}
        </x-forms.form-group> 
        <x-forms.form-group title="Password:">
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'block w-full mt-2 p-3 rounded-[10px] text-[1.5rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)] font-semibold focus-visible:outline-none')) !!}
        </x-forms.form-group> 
        <x-forms.form-group title="Confirm Password:">
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'block w-full mt-2 p-3 rounded-[10px] text-[1.5rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)] font-semibold focus-visible:outline-none')) !!}
        </x-forms.form-group> 
        <x-forms.form-group title="Role:">
            {!! Form::select('roles[]', $roles,$userRole,array(
                 'multiple',
                'class' => 'block w-full mt-2 p-3 rounded-[10px] text-[1.5rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)] font-semibold focus-visible:outline-none', 
                ))
            !!}
        </x-forms.form-group> 
    </div>
    <x-forms.submit-btn title="submit" class="mt-[20px] w-full"/>
    {!! Form::close() !!}
</x-admin-layout>