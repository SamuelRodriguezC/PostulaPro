<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('company_id')
                    ->label('Empresa')
                    ->relationship('company', 'name')
                    ->required(),

                Select::make('platform_id')
                    ->label('Plataforma')
                    ->relationship('platform', 'name')
                    ->default(null),

                Select::make('application_status_id')
                    ->label('Estado de la postulación')
                    ->visibleOn('edit')
                    ->relationship('applicationStatus', 'name')
                    ->required(),

                DatePicker::make('applied_at')
                    ->label('Fecha de postulación')
                    ->required(),

                TextInput::make('position')
                    ->label('Cargo / Posición')
                    ->required(),

                Textarea::make('job_description')
                    ->label('Descripción del cargo')
                    ->default(null)
                    ->columnSpanFull(),

                Textarea::make('requirements')
                    ->label('Requisitos')
                    ->default(null)
                    ->columnSpanFull(),

                TextInput::make('work_location')
                    ->label('Lugar de trabajo')
                    ->default(null),

                TextInput::make('schedule')
                    ->label('Horario')
                    ->default(null),

                TextInput::make('salary_min')
                    ->label('Salario mínimo')
                    ->numeric()
                    ->default(null),

                TextInput::make('salary_max')
                    ->label('Salario máximo')
                    ->numeric()
                    ->default(null),

                TextInput::make('salary_currency')
                    ->label('Moneda')
                    ->required()
                    ->default('COP'),

                Textarea::make('company_problem')
                    ->label('Problema que resuelve la empresa')
                    ->default(null)
                    ->columnSpanFull(),

                Textarea::make('interview_tips')
                    ->label('Notas / Tips para entrevista')
                    ->default(null)
                    ->columnSpanFull(),

                Toggle::make('email_sent')
                    ->label('Correo enviado')
                    ->required(),

                TextInput::make('cv_path')
                    ->label('Ruta del CV')
                    ->required(),

                TextInput::make('cover_letter_path')
                    ->label('Ruta de carta de presentación')
                    ->default(null),

                TextInput::make('interest_level')
                    ->label('Nivel de interés (1–5)')
                    ->required()
                    ->numeric()
                    ->default(3),

                DatePicker::make('follow_up_date')
                    ->label('Fecha de seguimiento'),

                DatePicker::make('response_date')
                    ->label('Fecha de respuesta'),

                TextInput::make('fit_score')
                    ->label('Puntaje de compatibilidad')
                    ->numeric()
                    ->default(null),

                Toggle::make('is_remote')
                    ->label('¿Es remoto?')
                    ->required(),
            ]);
    }
}