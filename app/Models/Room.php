<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hostel(): BelongsTo
    {
        return $this->belongsTo(Hostel::class) ;
    }

    

}
