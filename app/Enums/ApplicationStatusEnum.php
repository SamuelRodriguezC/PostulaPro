<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ApplicationStatusEnum: string implements HasColor, HasLabel
{
    case SENT = 'sent';
    case IN_PROCESS = 'in_process';
    case INTERVIEW = 'interview';
    case OFFER = 'offer';
    case REJECTED = 'rejected';

    public function getLabel(): string
    {
        return match ($this) {
            self::SENT => 'Enviada',
            self::IN_PROCESS => 'En proceso',
            self::INTERVIEW => 'Entrevista',
            self::OFFER => 'Oferta',
            self::REJECTED => 'Rechazada',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::SENT => 'info',
            self::IN_PROCESS => 'warning',
            self::INTERVIEW => 'primary',
            self::OFFER => 'success',
            self::REJECTED => 'danger',
        };
    }

    public function getOrder(): int
    {
        return match ($this) {
            self::SENT => 1,
            self::IN_PROCESS => 2,
            self::INTERVIEW => 3,
            self::OFFER => 4,
            self::REJECTED => 5,
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [
                $case->value => $case->getLabel(),
            ])
            ->toArray();
    }
}