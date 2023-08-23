@php
   $category = $post->category->pluck("id")->all()
@endphp
{{-- @dd($category) --}}
<x-app-layout>
    <main class="container">
        <p class="Post__edit">Edit Post</p>
        {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <x-forms.form-group title="Title:">
            <x-forms.create-input
                type="text"
                name="title"
                id="name"
                value="{{$post->title}}"
            />
        </x-forms.form-group> 
        <x-forms.form-group title="Body:">
            {{Form::textarea('body',  $post->body,['id' => 'editor','class'=> 'Form__input text-[1.8rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)]','placeholder' => 'Body Text'])}}
        </x-forms.form-group> 
        <x-forms.form-group title="Image:">
            {{Form::file('cover_image',['class'=> 'block'] )}}
        </x-forms.form-group> 
        <img class="Post__edit--image" src="/storage/cover_images/{{$post->cover_image}}" alt="">
        <x-forms.form-group title="Category: (press the ctrl button to select  multiple)">
            {!! Form::select('categories[]', $categories,$category,array(
                 'multiple',
                'class' => 'block w-full mt-2 p-3 rounded-[10px] text-[1.5rem] shadow-[0_5px_15px_rgba(0,0,0,0.4)] font-semibold focus-visible:outline-none', 
                ))
            !!}
        </x-forms.form-group>  
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary delete'])}}
        {!! Form::close() !!}
    </main>
</x-app-layout>