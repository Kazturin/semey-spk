<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $metaTitle?: __("site.app_title")}}</title>
    <meta name="description" content="{{ $metaDescription?:__("site.app_description") }}">

    <meta name="image" property="og:image" content="{{$metaImage ? asset('/storage/'.$metaImage) : '/logo-spk.jpg'}}">
    <meta property="og:image:alt" content="{{ $metaTitle }}">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:image" content="{{$metaImage ? asset('/storage/'.$metaImage) : '/logo-spk.jpg'}}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset("/css/swiper-bundle.min.css") }}">
    @livewireStyles
</head>

<body class="">
    <header x-data="{ openMenu: null, isBurgerMenuOpen: false }" class="shadow-sm lg:shadow-none">

        <nav class="sticky top-0 bg-white z-50">
            <div class="font-sf">
                <div class="container p-4 mx-auto" @click.outside="openMenu = null">

                    <div class="flex items-center justify-between border-b border-gray-300">
                        <a href="/"><img src="/logo-spk.jpg" alt="ornament" class="w-40"></a>
                        <div class="flex items-center space-x-6 ml-auto">
                            <div class="hidden lg:block">
                                <x-search-input></x-search-input>
                            </div>
                            <div class="hidden lg:block">
                                <p class="font-sf text-base xl:text-xl opacity-50">{{ $contact_center->{'title_'.app()->getLocale()} }}:</p>
                                <p><a href="tel:8 (7172) 23 57 00" data-as-button="false">{!! tiptap_converter()->asHTML($contact_center->{'content_'.app()->getLocale()}) !!}</a></p>
                            </div>
                            {!! tiptap_converter()->asHTML($social_networks->{'content_'.app()->getLocale()}) !!}

                            <livewire:language-selector />
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-4 space-x-4" aria-label="Global">

                        <div class="flex lg:hidden">
                            <button x-show="!isBurgerMenuOpen" type="button" @click="isBurgerMenuOpen=!isBurgerMenuOpen" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                                <span class="sr-only">Open main menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                                </svg>
                            </button>
                            <button x-show="isBurgerMenuOpen" type="button" @click="isBurgerMenuOpen=false" class="-m-2.5 rounded-md p-2.5 text-gray-700" style="display: none;">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="hidden lg:flex space-x-1 items-center text-sm uppercase font-sf">
                        @foreach($menu as $item)
                        @if(count($item->children)>0)
                            <div class="relative">
                                <button @mouseenter="openMenu === {{ $item->id }} ? openMenu = null : openMenu = {{ $item->id }}" @mouseleave="openMenu = null" type="button" class="flex items-center justify-between cursor-pointer w-full border-b uppercase border-white text-left text-sm px-4" aria-expanded="false">
                                {{ $item->{'title_'.app()->getLocale()} }}
                                    <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>

                                <div  x-cloak x-show="openMenu === {{ $item->id }}"
                                    @mouseenter="openMenu = {{ $item->id }}"
                                    @mouseleave="openMenu = null"
                                    class="absolute -left-8 top-full z-50 mt-3 w-screen max-w-96 overflow-hidden text-gray-700 rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5 px-5 py-4" x-transition:enter="transition ease-in duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-label="submenu" style="display: none;">
                                    <div>
                                    <ul class="list-none">
                                            @foreach($item->children as $child_item)
                                            @if(count($child_item->children)>0)
                                            <li class="mb-2" x-data="{ expanded: false }">
                                                <button id="faqs-title-{{$child_item->id}}" type="button"
                                                    class="flex items-center justify-between w-full hover:bg-secondary cursor-pointer hover:text-white uppercase hover:rounded-3xl text-sm px-4 py-2 text-left"
                                                    @click="expanded = !expanded" :aria-expanded="expanded"
                                                    aria-controls="faqs-text-{{$child_item->id}}">
                                                    <span>{{ $child_item->{'title_'.app()->getLocale()} }}</span>
                                                    <svg class="shrink-0 ml-8 w-3 h-3" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/>
                                                    </svg>
                                                </button>
                                                <div x-show="expanded" id="faqs-text-{{$child_item->id}}" role="region"
                                                    aria-labelledby="faqs-title-01"
                                                    class="grid overflow-hidden rounded-b-md transition-all duration-300 ease-in-out px-4 py-2"
                                                    :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                                                    <div class="overflow-hidden">
                                                        <ul class="list-none">
                                                            @foreach($child_item->children as $child)
                                                            @if(count($child->children)>0)
                                            <li class="mb-2" x-data="{ expanded: false }">
                                                <button id="faqs-title-{{$child_item->id}}" type="button"
                                                    class="flex items-center justify-between w-full hover:bg-secondary hover:text-white hover:rounded-3xl text-sm text-left mt-2 px-4 py-2"
                                                    @click="expanded = !expanded" :aria-expanded="expanded"
                                                    aria-controls="faqs-text-{{$child->id}}">
                                                    <span>{{ $child->{'title_'.app()->getLocale()} }}</span>
                                                    <svg class="shrink-0 ml-8 w-3 h-3" viewBox="0 0 24 24"  fill="currentColor">
                                                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/>
                                                    </svg>
                                                </button>
                                                <div x-show="expanded" id="faqs-text-{{$child->id}}" role="region"
                                                    aria-labelledby="faqs-title-01"
                                                    class="grid overflow-hidden rounded-b-md transition-all duration-300 ease-in-out px-4 py-2"
                                                    :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                                                    <div class="overflow-hidden">
                                                        <ul class="list-none">
                                                            @foreach($child->children as $last_child)
                                                            <li>
                                                                <a
                                                                    href="{{ $last_child->getUrl() }}"
                                                                    {{$last_child->is_external_link ? 'target="_blank"' : ''}}
                                                                    class="block hover:bg-secondary hover:text-white hover:rounded-3xl text-sm px-4 py-2">
                                                                    {{ $last_child->{'title_'.app()->getLocale()} }}
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            @else
                                                            <li>
                                                                <a
                                                                    href="{{ $child->getUrl() }}"
                                                                    {{$child->is_external_link ? 'target="_blank"' : ''}}
                                                                    class="block hover:bg-secondary  hover:text-white text-sm hover:rounded-3xl px-4 py-2">
                                                                    {{ $child->{'title_'.app()->getLocale()} }}
                                                                </a>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            @else
                                            <li class="mb-2">
                                                  <a
                                                    href="{{ $child_item->getUrl() }}"
                                                    {{$child_item->is_external_link ? 'target="_blank"' : ''}}
                                                    class="block hover:bg-secondary hover:text-white text-sm hover:rounded-3xl px-4 py-2">
                                                    {{ $child_item->{'title_'.app()->getLocale()} }}
                                                  </a>
                                             </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="py-2 px-4">
                                <a href="{{ $item->getUrl() }}"
                                {{$item->is_external_link ? 'target="_blank"' : ''}}>{{ $item->{'title_'.app()->getLocale()} }}</a>
                            </div>
                            
                            @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </nav>

<!-- Mobile navigation -->
        <div x-data="{ openMobileMenu: null }"  x-cloak x-show="isBurgerMenuOpen" class="lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 z-10"></div>
            <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between mt-24">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="/logo.svg" alt="logo">
                    </a>
                    <button type="button" @click="isBurgerMenuOpen=false" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-10 flow-root">
                    <div class="mb-4">
                        <div class="pt-2 relative ">
                            <form action="https://schools.nis.edu.kz/search?locale=kz" method="GET">
                                <input type="number" name="school_id" value="8" hidden="" class="hidden">
                                <input class="w-full lg:w-fit border border-light text-gray-500 bg-white h-10 px-5 pr-16 focus:border-2 focus:border-primary rounded-lg text-sm focus:outline-none" type="search" name="query" placeholder="Іздеу" value="">
                                <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                    <svg class="text-light h-4 w-4 cursor-pointer" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path>
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <div x-data="{ openChildMenu: null }" class="-mx-3">
                            @foreach($menu as $item)
                            @if(count($item->children)>0)
                            <button @click="openChildMenu === {{ $item->id }} ? openChildMenu = null : openChildMenu = {{ $item->id }}" type="button" class="flex w-full items-center rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                                    {{ $item->{'title_'.app()->getLocale()} }}
                                    <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div x-show="openChildMenu === {{ $item->id }}" class="mt-2 space-y-2" id="disclosure-1" style="display: none;">
                                @foreach($item->children as $cild)
                                @if(count($cild->children)>0)

                                @else
                                <a href="{{ $cild->getUrl() }}" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                {{ $cild->{'title_'.app()->getLocale()} }}
                                    </a>
                                    @endif
                                @endforeach
                                    
                                </div>
                            @else
                            <a class="block py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" href="{{ $item->getUrl() }}">{{ $item->{'title_'.app()->getLocale()} }}</a>
                            @endif
                            @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <main>
       {{ $slot }}
    </main>

    <footer class="bg-gray-600">
        <div class="container mx-auto px-10 py-16">
            {!! tiptap_converter()->asHTML($contacts_list->{'content_'.app()->getLocale()}) !!}
        </div>

    </footer>

    
    @livewireScripts
    @stack('scripts')
</body>

</html>