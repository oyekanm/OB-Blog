@props(['title'])

<a 
{{$attributes->merge(['class'=> 'Post__create', 'href'=>''])}}
>
{{$title}}
</a>