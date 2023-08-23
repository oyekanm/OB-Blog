{{-- @php
    $faker = Faker\Factory::create();
// generate data by calling methods
echo $faker->name();
@endphp --}}
<header  
 x-data="{ isOn: false }"
 {{-- @click="isOn = !isOn" --}}
 class="bg-white">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <x-nav.admin-navlink title="O|B Blog" href='/' />
    </div>
    <div class="flex lg:hidden ">
      <button @click="isOn = !isOn" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="h-[30px] w-[30px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    <div class="hidden lg:flex items-center lg:gap-x-12">
          <x-nav.admin-navlink title='Posts' href="{{route('posts.index')}}" />
        @guest
            @if (Route::has('login'))
              <x-nav.admin-navlink title="{{ __('Login') }}" href="{{ route('login') }}" />
            @endif
            @if (Route::has('register'))
              <x-nav.admin-navlink title="{{ __('Register') }}" href="{{ route('register') }}" />
            @endif
          @else
          <x-nav.admin-navlink title='dashboard' href="{{route('dashboard.index')}}" />
          @if (Auth::user()->hasRole("admin"))
          <x-nav.admin-navlink title='admin' href="{{route('admin.index')}}" />
          @endif
          <li class="list-none">
            <a id="navbarDropdown" class="text-[1.4rem] text-gray-900 no-underline font-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>
            
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
          </li>
        @endguest
    </div>
  </nav>
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div class="lg:hidden" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
      <div :class="{'inset-0': isOn, '': !isOn }" class="fixed backdrop-blur-[3px] z-10"></div>
      <div :class="{'right-0': isOn, 'right-[-100%]': !isOn }" class=" max-w-[80%] fixed transition-all duration-1000 inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex items-center justify-between">
        <x-nav.admin-navlink title="O|B Blog" href='/' />
        <button @click="isOn = !isOn" type="button"  class="-m-2.5 rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Close menu</span>
          <svg class="h-[30px] w-[30px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="space-y-2 py-6">
              <x-nav.admin-navlink title='Posts' href="{{route('posts.index')}}" />
            @guest
                @if (Route::has('login'))
                  <x-nav.admin-navlink title="{{ __('Login') }}" href="{{ route('login') }}" />
                @endif
                @if (Route::has('register'))
                  <x-nav.admin-navlink title="{{ __('Register') }}" href="{{ route('register') }}" />
                @endif
              @else
              <x-nav.admin-navlink title='dashboard' href="{{route('dashboard.index')}}" />
              @if (Auth::user()->hasRole("admin"))
              <x-nav.admin-navlink title='admin' href="{{route('admin.index')}}" />
              @endif
              <li class="list-none">
                <a id="navbarDropdown" class="text-[1.4rem] text-gray-900 no-underline font-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>
                
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
              </li>
            @endguest
           
          </div>
        </div>
      </div>
      </div>
  </div>
</header>
    