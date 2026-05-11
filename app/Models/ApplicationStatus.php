<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\ApplicationStatusEnum;

class ApplicationStatus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'order_index',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }


    // Métodos 
   public function enum(): ApplicationStatusEnum
    {
        return ApplicationStatusEnum::from($this->slug);
    }

    public function color(): string
    {
        return $this->enum()->getColor();
    }

    public static function getBySlug(string $slug): self
    {
        return static::query()
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
