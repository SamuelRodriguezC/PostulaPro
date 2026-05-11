<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'platform_id',
        'application_status_id',
        'applied_at',
        'position',
        'job_description',
        'requirements',
        'work_location',
        'schedule',
        'salary_min',
        'salary_max',
        'salary_currency',
        'company_problem',
        'interview_tips',
        'email_sent',
        'cv_path',
        'cover_letter_path',
        'interest_level',
        'follow_up_date',
        'response_date',
        'fit_score',
        'is_remote',
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
            'company_id' => 'integer',
            'platform_id' => 'integer',
            'application_status_id' => 'integer',
            'applied_at' => 'date',
            'salary_min' => 'decimal:2',
            'salary_max' => 'decimal:2',
            'email_sent' => 'boolean',
            'follow_up_date' => 'date',
            'response_date' => 'date',
            'is_remote' => 'boolean',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }

    public function applicationStatus(): BelongsTo
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    public function interviews(): HasMany
    {
        return $this->hasMany(Interview::class);
    }

    public function applicationStatusHistories(): HasMany
    {
        return $this->hasMany(ApplicationStatusHistory::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
