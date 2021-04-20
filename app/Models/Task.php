<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'description',
        'start_date',
        'start_time',
        'duration'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return  $this->belongsTo(Category::class);
    }
}
