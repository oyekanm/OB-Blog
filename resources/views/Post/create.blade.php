<x-app-layout>
    @php 
    function slugify($string)
    {
        #credit to Carlos Delgado
        #original link https://ourcodeworld.com/articles/read/253/creating-url-slugs-properly-in-php-including-transliteration-support-for-utf-8
        return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
    }
       
    @endphp
    {{-- @dd(slugify('Cómo hablar en sílabas')) --}}
    <main class="container">
        {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store','class'=>'Form','enctype' => 'multipart/form-data']) !!}
            <x-forms.form-group title="Title:">
                <x-forms.create-input
                    type="text"
                    name="title"
                    id="name"
                    value="{{old('title')}}"
                />
            </x-forms.form-group> 
            <x-forms.form-group title="Body:">
                {{Form::textarea('body', '',['id' => 'editor','class'=> 'Form__input text-[1.8rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)]','placeholder' => 'Body Text'])}}
            </x-forms.form-group> 
            <x-forms.form-group title="Image:">
                {{Form::file('cover_image',['class'=> 'block'] )}}
            </x-forms.form-group> 
            <x-forms.form-group title="Category: (press the ctrl button to select  multiple)">
                {!! Form::select('categories[]', $categories,[],array(
                     'multiple',
                    'class' => 'block w-full mt-2 p-3 rounded-[10px] text-[1.5rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)] font-semibold focus-visible:outline-none', 
                    ))
                !!}
            </x-forms.form-group> 
            {{Form::submit('Submit', ['class'=>'btn btn-primary delete'])}}
        {!! Form::close() !!}
    </main>
</x-app-layout>
