<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'client_id',
        'cost',
        'status',
        'start_date',
        'end_date'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function projectEmployees(): HasMany
    {
        return $this->hasMany(ProjectEmployee::class);
    }

    public function projectPayments(): HasMany
    {
        return $this->hasMany(ProjectPayment::class);
    }
}
