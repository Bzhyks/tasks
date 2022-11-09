<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    public function priority()
    {
        return $this->belongsTo(priority::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
