<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel' ,
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}