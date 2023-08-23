@props(['title'])

<div class="col-xs-12 col-sm-12 col-md-12">
    <div {{$attributes->merge(['class'=> 'mb-4'])}}>
        <span htmlFor="name" {{$attributes->merge(['class'=> 'text-[1.8rem] font-bold capitalize'])}}>
            {{$title}}
        </span>
        <span class="text-[1.6rem] font-medium capitalize">{{$slot}}</span>
    </div>
</div>