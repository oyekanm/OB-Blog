@if(count($errors) > 0)
{{-- @dd($errors) --}}
    @foreach($errors->all() as $error)
    <div x-data="{ open: true }">
        <div x-show="open" x-init="setTimeout(()=>open=false,2000)"  class="alert alert-danger">
            {{$error}}
        </div>
    </div>
    {{-- <div id="example" post={{$errors}} ></div> --}}
    @endforeach
@endif

{{-- <div x-data="{ open: false }">
    <button @click="open = true">Expand</button>
 
    <span x-show="open"  x-init="setTimeOut(()=>open=false,1000)">
        Content...
    </span>
</div> --}}

{{-- @if (Route::is('register'))
return route('posts.index')
@endif --}}

{{-- @dd(Route::is('register')) --}}

@if(session('success'))
    <div x-data="{ open: true }" x-show="open" x-init="setTimeout(()=>open=false,2000)"  class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div x-data="{ open: true }" x-show="open" x-init="setTimeout(()=>open=false,2000)"  class="alert alert-danger">
        {{session('error')}}
    </div>
@endif