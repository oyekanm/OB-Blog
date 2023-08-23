@props(['title'])

<div 
    {{$attributes->merge(['class'=> 'mb-4'])}}
    >
    <label htmlFor="name" {{$attributes->merge(['class'=> 'text-[1.8rem] font-bold mb-2 capitalize'])}}>
        {{$title}}
    </label>
        {{$slot}}
</div>