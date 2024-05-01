<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'slug', 'title', 'excerpt', 'description', 'is_pubished', 'min_to_read'
    ]; // allows us for mass assigment

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
