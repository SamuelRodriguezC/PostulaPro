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
                // TextInput::make('user_id')
                //     ->required()
                //     ->numeric(),
                Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                Select::make('platform_id')
                    ->relationship('platform', 'name')
                    ->default(null),
                Select::make('application_status_id')
                    ->relationship('applicationStatus', 'name')
                    ->default(null),
                DatePicker::make('applied_at')
                    ->required(),
                TextInput::make('position')
                    ->required(),
                Textarea::make('job_description')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('requirements')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('work_location')
                    ->default(null),
                TextInput::make('schedule')
                    ->default(null),
                TextInput::make('salary_min')
                    ->numeric()
                    ->default(null),
                TextInput::make('salary_max')
                    ->numeric()
                    ->default(null),
                TextInput::make('salary_currency')
                    ->required()
                    ->default('COP'),
                Textarea::make('company_problem')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('interview_tips')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('email_sent')
                    ->required(),
                TextInput::make('cv_path')
                    ->required(),
                TextInput::make('cover_letter_path')
                    ->default(null),
                TextInput::make('interest_level')
                    ->required()
                    ->numeric()
                    ->default(3),
                DatePicker::make('follow_up_date'),
                DatePicker::make('response_date'),
                TextInput::make('fit_score')
                    ->numeric()
                    ->default(null),
                Toggle::make('is_remote')
                    ->required(),
            ]);
    }
}
