<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_district',
        'address',
        'maps',
        'service_number',
        'branch_office_id'
    ];

    public function branch(): BelongsTo{
        return $this->belongsTo(BranchOffice::class, 'branch_office_id');
    }
}