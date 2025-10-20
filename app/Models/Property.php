<?php

namespace App\Models;

use App\Enums\PropertiesTypesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'for_sale',
        'for_rent',
        'sale_price',
        'rent_price',
        'condominium_price',
        'type',
        'active',
        'created_by',
    ];

    protected $casts = [
        'for_sale' => 'boolean',
        'for_rent' => 'boolean',
        'active' => 'boolean',
        'sale_price' => 'decimal:2',
        'rent_price' => 'decimal:2',
        'condominium_price' => 'decimal:2',
        'type' => PropertiesTypesEnum::class,
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
