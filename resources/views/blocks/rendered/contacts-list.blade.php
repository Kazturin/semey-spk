<div class="flex flex-col md:flex-row space-x-10 space-y-6 text-white text-base font-sf">
    @foreach ($list as $item)
    <div class="flex space-x-2">
        <img src="/storage/{{ $item['icon'] }}" class="w-7 h-7" alt="icon">
        <div>
            <p class="text-sm text-gray-300">{{ $item['title'] }}:</p>
            <span class="topfoot-call">{{ $item['value'] }}</span>
        </div>
    </div>
    @endforeach
</div>