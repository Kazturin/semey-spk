<x-layout>
<div class="overflow-hidden header-slider relative h-screen [max-height:calc(100vh-180px)] shadow-md border-t lg:border-none border-gray-200">
    <div class="swiper-wrapper flex items-stretch h-full">
        <div class="swiper-slide h-full max-h-screen overflow-hidden">
            <div class="relative h-full">
                <img src="/img/banner.jpg" class="absolute inset-0 object-cover object-left h-full lg:h-auto lg:object-right md:object-center" alt="">
                <div class="relative h-full z-20">
                   
         <div class="container mx-auto h-full">
<div class="flex items-center h-full space-x-10 text-primary">
                        <img src="/img/element.jpg" class="h-full" alt="">
                        <div x-data="{ shown: false }" x-intersect:enter="shown = true" 
                        x-intersect:leave="shown = false" :class="{
             'opacity-0': !shown,
             'opacity-100 animate-fade-in-left': shown
         }">
                        <p class="text-3xl">АКЦИОНЕРНОЕ ОБЩЕСТВО <br>
                        «ӘЛЕУМЕТТІК-КӘСІПКЕРЛІК КОРПОРАЦИЯСЫ </p>
                    <p class="font-roboto text-5xl font-semibold my-2">«СЕМЕЙ»</p>
                    </div>
                    </div>
         </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide h-full max-h-screen overflow-hidden">
            <div class="shadow-md relative h-full">
                <div class="absolute inset-0 bg-primary opacity-50"></div>
                <img src="/img/product.jpg" class="w-full h-full object-cover" alt="">
                <div
                    x-data="{ shown: false }" x-intersect:enter="shown = true" 
                    x-intersect:leave="shown = false" :class="{
             'opacity-0': !shown,
             'opacity-100 animate-fade-in-right': shown
         }" class="w-full lg:w-auto px-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-center">
                    <p class="font-roboto text-5xl font-semibold my-2">Азық-түлік қауіпсіздігі</p>
                    <p class="text-3xl my-4">Елордалық тұрақтандыру қоры әлеуметтік маңызы бар азық -түлік тауарларының бағасын реттейді.</p>
                    <a href="#" class="block mx-auto border-3 border-white w-fit hover:bg-primary text-white rounded-3xl font-sf font-medium text-xl my-4 py-2 px-5">Толығырақ</a>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination bottom-10!"></div>
</div>
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
                <div class="swiper-slide p-2">
                    <a href="#" target="_blank">
                        <img class="block w-full object-cover px-10" src="/img/partners1.png" alt="partner">
                    </a>
                </div>
                <div class="swiper-slide p-2">
                    <a href="#" target="_blank">
                        <img class="block w-full object-cover px-10" src="/img/partners2.png" alt="partner">
                    </a>
                </div>
                <div class="swiper-slide p-2">
                    <a href="#" target="_blank">
                        <img class="block w-full object-cover px-10" src="/img/partners3.jpg" alt="partner">
                    </a>
                </div>
                <div class="swiper-slide p-2">
                    <a href="#" target="_blank">
                        <img class="block w-full object-cover px-10" src="/img/partners4.png" alt="partner">
                    </a>
                </div>
                <div class="swiper-slide p-2">
                    <a href="#" target="_blank">
                        <img class="block w-full object-cover px-10" src="/img/partners5.png" alt="partner">
                    </a>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
</x-layout>