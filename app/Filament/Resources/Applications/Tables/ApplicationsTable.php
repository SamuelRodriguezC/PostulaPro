<?php

namespace App\Filament\Resources\Applications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company.name')
                    ->searchable(),
                TextColumn::make('platform.name')
                    ->searchable(),
                TextColumn::make('applicationStatus.name')
                    ->badge()
                    ->color(fn ($record) => $record->applicationStatus->enum()->getColor())
                    ->sortable()
                    ->searchable(),
                TextColumn::make('applied_at')
                    ->date()
                    ->sortable(),
                TextColumn::make('position')
                    ->searchable(),
                TextColumn::make('work_location')
                    ->searchable(),
                TextColumn::make('schedule')
                    ->searchable(),
                TextColumn::make('salary_min')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('salary_max')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('salary_currency')
                    ->searchable(),
                IconColumn::make('email_sent')
                    ->boolean(),
                TextColumn::make('cv_path')
                    ->searchable(),
                TextColumn::make('cover_letter_path')
                    ->searchable(),
                TextColumn::make('interest_level')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('follow_up_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('response_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('fit_score')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_remote')
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
