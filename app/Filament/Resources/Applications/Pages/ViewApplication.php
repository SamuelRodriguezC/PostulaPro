<?php

namespace App\Filament\Resources\Applications\Pages;

use App\Filament\Resources\Applications\ApplicationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Support\Enums\TextSize;


class ViewApplication extends ViewRecord
{
    protected static string $resource = ApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema->schema([
            Grid::make(12)->columnSpanFull()->schema([

                $this->generalSection()
                    ->columnSpan(8),

                $this->salarySection()
                    ->columnSpan(4),

                $this->trackingSection()
                    ->columnSpan(9),

                $this->documentsSection()
                    ->columnSpan(3),
            ]),
        ]);
    }

    protected function generalSection(): Section
    {
        return Section::make('Información Principal')
            ->icon('heroicon-o-briefcase')
            ->columns(2)
            ->schema([
                TextEntry::make('position')
                    ->label('Cargo')
                    ->weight('bold')
                    ->size(TextSize::Large),

                TextEntry::make('company.name')
                    ->label('Empresa'),

                TextEntry::make('platform.name')
                    ->label('Plataforma'),

                TextEntry::make('applicationStatus.name')
                    ->label('Estado')
                    ->badge()
                    ->color(fn ($record) => $record->applicationStatus?->enum()?->getColor()),

                TextEntry::make('work_location')
                    ->label('Ubicación'),

                IconEntry::make('is_remote')
                    ->label('Remoto')
                    ->boolean(),

                TextEntry::make('applied_at')
                    ->label('Fecha de Aplicación')
                    ->date('d M Y'),
            ]);
    }

    protected function salarySection(): Section
    {
        return Section::make('Condiciones Económicas')
            ->icon('heroicon-o-currency-dollar')
            ->columns(2)
            ->schema([
                TextEntry::make('salary_min')
                    ->label('Salario Mínimo')
                    ->size(TextSize::Large)
                    ->money('COP', decimalPlaces: 0),

                TextEntry::make('salary_max')
                    ->label('Salario Máximo')
                    ->size(TextSize::Large)
                    ->money('COP', decimalPlaces: 0),

                TextEntry::make('schedule')
                    ->label('Horario')
                    ->columnSpanFull(),
            ]);
    }

    protected function trackingSection(): Section
    {
        return Section::make('Seguimiento')
            ->icon('heroicon-o-chart-bar')
            ->columns(3)
            ->schema([
                IconEntry::make('email_sent')
                    ->label('Email Enviado')
                    ->boolean(),

                TextEntry::make('interest_level')
                    ->label('Nivel de Interés')
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state >= 8 => 'success',
                        $state >= 5 => 'warning',
                        default => 'gray',
                    }),

                TextEntry::make('fit_score')
                    ->label('Puntuación')
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state >= 80 => 'success',
                        $state >= 60 => 'warning',
                        default => 'danger',
                    }),

                TextEntry::make('response_date')
                    ->label('Fecha de Respuesta')
                    ->date(),

                TextEntry::make('follow_up_date')
                    ->label('Fecha de Seguimiento')
                    ->date(),
            ]);
    }

    protected function documentsSection(): Section
    {
        return Section::make('Documentación y Notas')
            ->icon('heroicon-o-document-text')
            ->columns(2)
            ->schema([
                TextEntry::make('cv_path')
                    ->label('CV')
                    ->url(fn ($record) => $record->cv_path)
                    ->openUrlInNewTab(),

                TextEntry::make('cover_letter_path')
                    ->label('Carta de Presentación')
                    ->url(fn ($record) => $record->cover_letter_path)
                    ->openUrlInNewTab(),

                TextEntry::make('notes')
                    ->label('Notas')
                    ->columnSpanFull()
                    ->markdown(),
            ]);
    }
}