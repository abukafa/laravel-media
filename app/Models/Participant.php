<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
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

    public function bookmarkedTasks()
    {
        return $this->belongsToMany(Task::class, 'bookmarks', 'participant_id', 'task_id');
    }
}
