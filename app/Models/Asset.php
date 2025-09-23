<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enum\AssetStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    protected $fillable = [
        'name',
        'serial_number',
        'asset_tag',
        'category_id',
        'location_id',
        'manufacturer_id',
        'model',
        'purchase_date',
        'warranty_expiration',
        'status',
        'assigned_to_user_id',
        'notes',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'purchase_price' => 'decimal:2',
        'status' => AssetStatusEnum::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }   

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }
    
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }
}
