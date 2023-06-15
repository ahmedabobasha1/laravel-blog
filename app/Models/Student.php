<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'name',
        'iDno',
        'age',
        'track_id',
        'user_id',
    ];

    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class);
    }

}
