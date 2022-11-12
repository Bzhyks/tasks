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


    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeSearch($query, $search)
    {
        if ($search !== null) {
            $query->where('name', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->get();
        }
        return $query;
    }


    public function scopeFromPriority($query, $priorityId)
    {
        if ($priorityId !== null) {
            $query->where('priority_id', $priorityId);
        }
        return $query;
    }
}
