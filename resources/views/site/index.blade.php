<x-layout>
{!! tiptap_converter()->asHTML($banner->{'content_'.app()->getLocale()}) !!}
@if ($info)
<section class="py-12">
{!! tiptap_converter()->asHTML($info->{'content_'.app()->getLocale()}) !!}
</section>
@endif

<section>
<div class="container mx-auto pt-14 mb-10">
    <div>
   <div x-data="{ shown: false }"
         x-intersect="shown = true"
         :class="{
             'opacity-0': !shown,
             'opacity-100 animate-fade-in-left': shown
         }" class="font-inter text-4xl xl:text-5xl text-center my-16">
                <a href="{{ $news_page->getUrl() }}">{{ __("News") }}</a>              
            </div>
    <div>
      
            <div 
            x-data="{ shown: false }"
         x-intersect="shown = true"
         :class="{
             'opacity-0': !shown,
             'opacity-100 animate-fade-in-right': shown
         }"
            class="flex lg:max-h-[588px] flex-col lg:flex-row"  >
                <div class="relative w-full rounded-3xl overflow-hidden lg:w-7/12 px-4 lg:px-0">
                    <img class="w-full h-full object-cover" src="{{ $mainNews->getImage() }}" alt="news">
                    <div class="block lg:hidden">
                    @include('partials.news-main', ['news' => $mainNews])
              </div>
                </div>
                <div class="w-full lg:w-5/12 px-4">
                  @foreach($sideNews as $val)
                    <div class="flex flex-col lg:flex-row space-x-2 rounded-3xl overflow-hidden lg:h-1/4">
                           <img class="flex-shrink-0 w-full lg:w-4/12 rounded-xl h-full object-cover px-1 py-2" src="{{ $val->getImage() }}" alt="">
                        <div class="flex-1 py-2">
                          <a href="{{ $val->getUrl() }}">
                            <p class="font-sf font-semibold text-xl">{{ $val->shortTitle(80) }}</p> 
                        </a>
                            <p class="font-sf opacity-60 text-sm">{{ $val->getFormattedDate() }}</p>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
            <div class="flex flex-col lg:flex-row">
                <div class="hidden lg:block w-full">
 <div class="relative w-full lg:w-7/12">
              <div class="lg:pl-10">
              @include('partials.news-main', ['news' => $mainNews])
              </div>    
            </div>
                </div>
            </div>
    </div>
</div>
</div>
</section>
<section class="my-20">
    <div class="md:container mx-auto md:px-4">
        <div x-data="{ shown: false }" x-intersect="shown = true" :class="{
             'opacity-0': !shown,
             'opacity-100 animate-fade-in-up': shown
         }" class="partners-slider relative overflow-hidden swiper-initialized swiper-horizontal swiper-pointer-events opacity-100 animate-scale-in">
            <div class="swiper-wrapper flex items-center">
                @foreach ($partners as $item)
                <div class="swiper-slide p-2">
                    <a href="#" target="_blank">
                        <img class="block w-full object-cover px-10" src="{{ $item->getLogo() }}" alt="partner">
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
@push('scripts')
<script src="{{ asset("/js/swiper-bundle.min.js") }}"></script>
    <script>
        var swiper = new Swiper('.header-slider', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            loop: true,
            autoplay: true,
            mousewheel: {
                enabled: true,
                forceToAxis: true,
                noMousewheelClass: 'swiper-no-mousewheel'
            },
            grabCursor: true,
            slidesPerView: 1,

        });

        var swiper = new Swiper('.partners-slider', {
            spaceBetween: 30,
            loop: true,
            autoplay: true,
            mousewheel: true,
            grabCursor: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                480: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1300: {
                    slidesPerView: 5,
                    spaceBetween: 30
                }
            }
        });
    </script>
    @endpush('scripts')
</x-layout>