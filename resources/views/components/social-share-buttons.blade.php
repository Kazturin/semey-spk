<div class="p-4">
    <div class="p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="mb-4 text-xl font-semibold text-center text-gray-700">{{ __("Share on social networks") }}</h2>
                <ul class="flex justify-center space-x-6">
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank" rel="noopener" class="text-gray-700 hover:text-blue-500">
                            <img src="/img/icons/facebook_1.png" alt="Facebook" class="w-8 h-8">
                        </a>
                    </li>
                    <li>
                        <a href="http://twitter.com/share?url={{ urlencode($url) }}&text={{ urlencode($text) }}" class="text-gray-700 hover:text-blue-500">
                            <img src="/img/icons/twitter.png" alt="Twitter" class="w-8 h-8">
                        </a>
                    </li>
                    <li>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($text) }}" class="text-gray-700 hover:text-green-500">
                            <img src="/img/icons/whatsapp.png" alt="WhatsApp" class="w-8 h-8">
                        </a>
                    </li>
                    <li>
                        <a href="https://telegram.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($text) }}" class="text-gray-700 hover:text-blue-400">
                            <img src="/img/icons/telegram_1.png" alt="Telegram" class="w-8 h-8">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


