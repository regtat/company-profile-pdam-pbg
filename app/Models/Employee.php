<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'phone_number',
        'address',
        'birthday_date',
        'position_id'
    ];
    public function position(): BelongsTo{
        return $this->belongsTo(Position::class);
    }
}