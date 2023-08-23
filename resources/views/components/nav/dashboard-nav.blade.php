<header  
  x-data="{ isOn: false, isOpen: false }"
  {{-- @click="isOn = !isOn" --}}
  class="bg-white w-full">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <x-nav.admin-navlink title='home' href='/' />
      </div>
      <div class="flex lg:hidden ">
        <button @click="isOn = !isOn" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-[30px] w-[30px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div  class="hidden lg:flex items-center lg:gap-x-12">
        {{-- SETTINGS BUTTON --}}
        {{-- <div 
         class="relative">
          <button @click="isOpen = !isOpen" type="button"  class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900" aria-expanded="false">
            <x-nav.admin-navlink title='Settings' href='#'/>
            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
          </button>
          <div
            :class="{'': isOpen, 'hidden': !isOpen }"
            class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
            <div class="p-4">
              <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                  <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                  </svg>
                </div>
                <div class="flex-auto">
                  <x-nav.admin-navlink title='admin' href="{{route('admin.index')}}" />
                  <x-nav.admin-navlink title='admin' href="{{route('admin.index')}}" />
                  <x-nav.admin-navlink title='admin' href="{{route('admin.index')}}" />
                  <a href="#" class="block font-semibold text-gray-900">
                    Analytics
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="mt-1 text-gray-600">Get a better understanding of your traffic</p>
                </div>
              </div>
              <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                  <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                  </svg>
                </div>
                <div class="flex-auto">
                  <a href="#" class="block font-semibold text-gray-900">
                    Engagement
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="mt-1 text-gray-600">Speak directly to your customers</p>
                </div>
              </div>
              <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                  <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                  </svg>
                </div>
                <div class="flex-auto">
                  <a href="#" class="block font-semibold text-gray-900">
                    Security
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="mt-1 text-gray-600">Your customers’ data will be safe and secure</p>
                </div>
              </div>
              <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                  <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                  </svg>
                </div>
                <div class="flex-auto">
                  <a href="#" class="block font-semibold text-gray-900">
                    Integrations
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="mt-1 text-gray-600">Connect with third-party tools</p>
                </div>
              </div>
              <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                  <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                  </svg>
                </div>
                <div class="flex-auto">
                  <a href="#" class="block font-semibold text-gray-900">
                    Automations
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="mt-1 text-gray-600">Build strategic funnels that will convert</p>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- @dd(Auth::user()->hasRole("admin")) --}}
        @if (Auth::user()->hasRole("admin"))
            <x-nav.admin-navlink title='admin' href="{{route('admin.index')}}" />
        @endif
        @if (Route::is('category.*') )
            <x-nav.admin-navlink title='create post' href="{{route('posts.create')}}" />
        @else
        <x-nav.admin-navlink title='categories' href="{{route('category.index')}}" />
        @endif
        {{-- @dd(Route::currentRouteName()) --}}
        {{-- @dd(Route::current()->uri === 'category') --}}
        <x-nav.admin-navlink title='posts' href="{{route('posts.index')}}" />
        <form  action="{{ route('logout') }}" method="POST" class="">
            @csrf
            <button type="submit" class="text-[1.4rem] no-underline font-semibold capitalize">logout</button>
        </form>
      </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
        <div
          :class="{'inset-0': isOn, '': !isOn }" 
          class="fixed backdrop-blur-[3px] z-10" 
        ></div>
        <div :class="{'right-0': isOn, 'right-[-100%]': !isOn }" class="fixed transition-all duration-1000 inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 max-w-[80%] sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
          <div class="flex items-center justify-between">
            <x-nav.admin-navlink title='home' href='/' />
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
                {{-- SETTINGS BUTTON --}}
                {{-- <div class="-mx-3">
                  <button  @click="isOpen = !isOpen" type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                    <x-nav.admin-navlink title='Settings' href='#'/>
                    <!--
                      Expand/collapse icon, toggle classes based on menu open state.
    
                      Open: "rotate-180", Closed: ""
                    -->
                    <svg
                      class="h-[18px] w-[18px] flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                  </button>
                  <!-- 'Product' sub-menu, show/hide based on menu state. -->
                  <div :class="{'': isOpen, 'hidden': !isOpen }" class="mt-2 space-y-2" id="disclosure-1">
                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Analytics</a>
                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Engagement</a>
                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Security</a>
                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Integrations</a>
                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Automations</a>
                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Watch demo</a>
                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact sales</a>
                  </div>
                </div> --}}
                @if (Route::current()->uri === 'category')
                <x-nav.admin-navlink title='create post' href="{{route('posts.create')}}" />
                @else
                <x-nav.admin-navlink title='posts' href="{{route('posts.index')}}" />
                @endif
                <x-nav.admin-navlink title='categories' href="{{route('category.index')}}" />
                @if (Auth::user()->hasRole("admin"))
                <x-nav.admin-navlink title='admin' href="{{route('admin.index')}}" />
                @endif
                <form  action="{{ route('logout') }}" method="POST" class="">
                @csrf
                <button type="submit" class="text-[1.4rem] no-underline font-semibold capitalize">logout</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</header>