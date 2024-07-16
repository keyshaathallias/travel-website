<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function destinations(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }

    public function total(): float
    {
        return $this->quantity * ($this->destinations->ticket_price ?? 0);
    }
}
