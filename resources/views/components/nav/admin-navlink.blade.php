@props(['title'])

<a
    {{$attributes->merge([
        'class'=>'-mx-3 block rounded-lg px-3 capitalize py-2 text-[1.4rem] no-underline font-semibold leading-7 text-gray-900 hover:bg-gray-50',
        'href'=> ''
    ])}}
>
    {{$title}}
</a>