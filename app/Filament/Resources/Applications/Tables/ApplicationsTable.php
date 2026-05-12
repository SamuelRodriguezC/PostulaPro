<?php

namespace App\Filament\Resources\Applications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company.name')
                    ->label('Empresa')
                    ->searchable(),
                TextColumn::make('platform.name')
                    ->label('Plataforma')
                    ->searchable(),
                TextColumn::make('applicationStatus.name')
                    ->label('Estado')
                    ->badge()
                    ->color(fn ($record) => $record->applicationStatus->enum()->getColor())
                    ->sortable()
                    ->searchable(),
                TextColumn::make('applied_at')
                    ->label('Solicitud')
                    ->date()
                    ->sortable(),
                TextColumn::make('position')
                    ->label('Cargo')
                    ->searchable(),
                TextColumn::make('work_location')
                    ->label('Ubicación')
                    ->searchable(),
                TextColumn::make('schedule')
                    ->label('Horario')
                    ->searchable(),
                TextColumn::make('salary_min')
                    ->label('Salario Mínimo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('salary_max')
                    ->label('Salario Máximo')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('email_sent')
                    ->label('Email Enviado')
                    ->boolean(),
                TextColumn::make('interest_level')
                    ->label('Mi Interés')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fit_score')
                    ->label('Puntuación')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                TextColumn::make('response_date')
                    ->label('Fecha de Respuesta')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->date()
                    ->sortable(),
                TextColumn::make('follow_up_date')
                    ->label('Fecha de Seguimiento')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->date()
                    ->sortable(),
                TextColumn::make('cv_path')
                    ->label('CV')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('cover_letter_path')
                    ->label('Carta Presentación')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('salary_currency')
                    ->label('Moneda')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                IconColumn::make('is_remote')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
