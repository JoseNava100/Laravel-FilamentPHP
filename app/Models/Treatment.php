<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Treatment extends Model
{
    use HasFactory;
    protected $cast = [
        'price' => MoneyCast::class,
    ];
    public function patients():BelongsTo{
        return $this->belongsTo(Patient::class);
    }
}
