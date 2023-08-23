@props(['title'])

<button 
    {{$attributes->merge([
    'class'=> 'delete btn btn-danger',
     'type'=>'submit',
     ])}}
>
{{$title}}
</button>