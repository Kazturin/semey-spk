<?php

namespace App\Filament\Resources\PageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequestsRelationManager extends RelationManager
{
    protected static string $relationship = 'requests';

    protected static ?string $title = 'Заявки';
    protected static ?string $modelLabel = 'заявка';
    protected static ?string $pluralModelLabel = 'заявки';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact')
                    ->label('Контактная информация')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('message')
                    ->label('Сообщение')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('department_id')
                    ->label('Отдел')
                    ->relationship('department', 'name_ru')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->placeholder('Выберите отдел'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Имя'),
                Tables\Columns\TextColumn::make('contact')
                    ->label('Контактная информация'),
                Tables\Columns\TextColumn::make('department.name_ru')
                    ->label('Отдел')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
