<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\MarkdownEditor;


class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('industry')
                    ->label('Industria')
                    ->default(null),
                TextInput::make('website')
                    ->label('Sitio Web')
                    ->url()
                    ->default(null),
                TextInput::make('hr_email')
                    ->label('Email RH')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel()
                    ->default(null),
                TextInput::make('location')
                    ->label('Ubicación')
                    ->default(null),
                TextInput::make('size')
                    ->label('Tamaño')
                    ->default(null),
                MarkdownEditor::make('notes')
                    ->label("Notas")
                    ->toolbarButtons([
                        ['bold', 'italic', 'strike'],
                        ['heading'],
                        ['bulletList', 'orderedList'],
                        ['undo', 'redo'],
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
