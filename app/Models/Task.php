<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
