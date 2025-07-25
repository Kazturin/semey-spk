<?php
namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class SocialNetworksBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.social-list';

    public string $rendered = 'blocks.rendered.social-list';
    public string $width = '2xl';

    public ?string $label = 'Cоциальные сети';

    public function getFormSchema(): array
    {
        return [
            Repeater::make('list')
                ->label('Список')
                ->schema([
                TextInput::make('link')
                    ->label('Ссылка')
                    ->maxLength(255)
                    ->required(),
                FileUpload::make('icon')
                    ->label('Иконка')
                    ->image()
                    ->optimize('webp')
                    ->directory('contacts'),
            ])
            
        ];
    }
    
}