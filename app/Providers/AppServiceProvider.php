<?php

namespace App\Providers;

use App\Filament\TiptapBlock\AccordionBlock;
use App\Filament\TiptapBlock\ContactsListBlock;
use App\Filament\TiptapBlock\FullSliderBlock;
use App\Filament\TiptapBlock\GalleryBlock;
use App\Filament\TiptapBlock\InfoBlock;
use App\Filament\TiptapBlock\SocialNetworksBlock;
use App\Filament\TiptapBlock\TabsBlock;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component
                ->blocks([
                    GalleryBlock::class,
                    AccordionBlock::class,
                    TabsBlock::class,
                    InfoBlock::class,
                    FullSliderBlock::class,
                    ContactsListBlock::class,
                    SocialNetworksBlock::class
                ]);
        });
    }
}
