<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_person',
        'contact_details',
        'billing_info',
    ];

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
