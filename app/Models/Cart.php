<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'destination_id',
        'full_name',
        'email',
        'departure_date',
        'quantity',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function destinations(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function total(): float
    {
        return $this->quantity * ($this->destinations->ticket_price ?? 0);
    }
}
