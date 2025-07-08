<div class="flex space-x-2">
@foreach ($list as $item)
<a href="{{ $item['link'] }}" target="_blank">
<img src="/storage/{{ $item['icon'] }}" class="w-7 h-7" alt="icon">
</a>
@endforeach
</div>