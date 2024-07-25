<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Face extends Model
{
    use HasFactory;

    CONST STATUS_WAITING = 'Waiting';
    CONST STATUS_ACTIVE = 'Active';
    CONST STATUS_DEACTIVATE = 'Deactivate';

    protected $fillable = [
        "img_face",
        "img_passport",
        "status",
    ];

    public function scopeIsActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }
}
