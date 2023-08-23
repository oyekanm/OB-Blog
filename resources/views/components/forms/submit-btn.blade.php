@props(['title'])

<button 
    {{$attributes->merge([
    'class'=> 'text-[1.8rem] mt-[20px] capitalize shadow-[0_1px_10px_rgba(0,0,0,0.5)] bg-white font-medium px-[2rem] py-[1rem] rounded-[10px] text-gray-800',
     'type'=>'submit',
     ])}}
>
{{$title}}
</button>