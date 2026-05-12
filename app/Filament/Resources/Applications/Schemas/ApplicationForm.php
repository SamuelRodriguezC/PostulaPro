<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;


class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('ApplicationTabs')
                    ->tabs([

                        /*
                        |--------------------------------------------------------------------------
                        | 1. Información General
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Información General')
                            ->schema([
                                Section::make('Datos principales')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Select::make('company_id')
                                                    ->label('Empresa')
                                                    ->relationship('company', 'name')
                                                    ->searchable()
                                                    ->preload()
                                                    ->required(),

                                                Select::make('platform_id')
                                                    ->label('Plataforma')
                                                    ->relationship('platform', 'name')
                                                    ->searchable()
                                                    ->preload(),
                                            ]),

                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('position')
                                                    ->label('Cargo / Posición')
                                                    ->required(),

                                                DatePicker::make('applied_at')
                                                    ->label('Fecha de postulación')
                                                    ->required(),
                                            ]),

                                        Select::make('application_status_id')
                                            ->label('Estado')
                                            ->relationship('applicationStatus', 'name')
                                            ->visibleOn('edit')
                                            ->required(),
                                    ]),
                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | 2️. Detalles del Cargo
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Detalles del Cargo')
                            ->schema([
                                Textarea::make('job_description')
                                    ->label('Descripción del cargo')
                                    ->columnSpanFull(),

                                TagsInput::make('requirements')
                                    ->label('Requisitos del Cargo')
                                    ->separator(',')
                                    ->splitKeys([',', 'Enter', 'Tab'])
                                    ->columnSpanFull(),

                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('work_location')
                                            ->label('Lugar de trabajo'),

                                        Toggle::make('is_remote')
                                            ->label('¿Es remoto?')
                                            ->inline(false),
                                    ]),

                                TextInput::make('schedule')
                                    ->label('Horario'),
                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | 3️. Compensación
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Compensación')
                            ->schema([
                                Fieldset::make('Rango salarial')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                TextInput::make('salary_min')
                                                    ->label('Salario mínimo')
                                                    ->numeric()
                                                    ->step(100000),

                                                TextInput::make('salary_max')
                                                    ->label('Salario máximo')
                                                    ->numeric()
                                                    ->step(100000),

                                                TextInput::make('salary_currency')
                                                    ->label('Moneda')
                                                    ->default('COP')
                                                    ->required(),
                                            ]),
                                    ]),
                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | 4️. Seguimiento
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Seguimiento')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        DatePicker::make('follow_up_date')
                                            ->label('Fecha de seguimiento'),

                                        DatePicker::make('response_date')
                                            ->label('Fecha de respuesta'),
                                    ]),

                                Toggle::make('email_sent')
                                    ->label('Correo enviado'),

                                Textarea::make('interview_tips')
                                    ->label('Notas / Tips para entrevista')
                                    ->columnSpanFull(),
                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | 5️. Evaluación Personal
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Evaluación')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('interest_level')
                                            ->label('Nivel de interés (1–5)')
                                            ->numeric()
                                            ->default(3)
                                            ->minValue(1)
                                            ->maxValue(5),

                                        TextInput::make('fit_score')
                                            ->label('Puntaje de compatibilidad')
                                            ->numeric(),
                                    ]),

                                Textarea::make('company_problem')
                                    ->label('Problema que resuelve el puesto')
                                    ->columnSpanFull(),
                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | 6️. Archivos
                        |--------------------------------------------------------------------------
                        */

                        Tab::make('Archivos')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        FileUpload::make('cv_path')
                                            ->label('Ruta del CV')
                                            ->preserveFilenames()
                                            ->openable()
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->directory('cvs'),

                                        FileUpload::make('cover_letter_path')
                                            ->label('Carta de presentación')
                                            ->preserveFilenames()
                                            ->openable()
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->directory('cover_letters'),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}