<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'support_url',
        'support_phone',
        'support_email',
    ];

    /**
     * Get the assets for the manufacturer.
     */
    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}
